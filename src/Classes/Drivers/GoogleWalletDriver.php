<?php

declare(strict_types=1);

namespace TWOH\WalletDriver\Drivers;

use Google\Client;
use Google\Exception;
use Google\Service\Walletobjects;
use Google\Service\Walletobjects\LoyaltyClass;
use Google\Service\Walletobjects\LoyaltyObject;
use InvalidArgumentException;
use LogicException;
use TWOH\Logger\Traits\LoggerTrait;
use TWOH\WalletDriver\Exceptions\JWTTokenException;
use TWOH\WalletDriver\Models\Account;
use TWOH\WalletDriver\Models\ClientConfig;
use TWOH\WalletDriver\Models\Connection;
use TWOH\WalletDriver\Models\Wallet;
use TWOH\WalletDriver\Services\JWTService;

class GoogleWalletDriver implements DriverInterface
{
    use LoggerTrait;

    /**
     * @var Account
     */
    protected Account $account;

    /**
     * @var Wallet
     */
    protected Wallet $wallet;

    /**
     * Returns a link that allows the end user to add the card directly to their Google Wallet
     *
     * @return string
     * @throws Exception
     */
    public function buildWallet(): string
    {
        $this->connect();

        $walletService = $this->createWalletObject();

        $loyaltyClass = $this->createLoyaltyClass($walletService);
        if (!is_null($loyaltyClass)) {
            $loyaltyObject = $this->createLoyaltyObject($walletService);
            if (!is_null($loyaltyObject)) {
                try {
                    return (new JWTService())->generateGoogleLinkToAddWalletToDevice(
                        $this->getAccount(),
                        $this->getWallet()
                    );
                } catch (JWTTokenException $e) {
                    $this->error($e->getMessage());
                }
            }
        }

        return '';
    }

    /**
     * @return void
     * @throws Exception
     */
    public function connect(): void
    {
        // create google client
        $client = new Client();
        $client->setApplicationName($this->getAccount()->getApplicationName());
        $client->addScope($this->getAccount()->getScope());

        try {
            $client->setAuthConfig($this->getAccount()->getAuthConfig()); // JSON-Datei
        } catch (InvalidArgumentException|LogicException $e) {
            $this->error($e->getMessage());
        }

        // set connection
        $this->getAccount()->setConnection(new Connection(
            new ClientConfig(
                $client
            )
        ));

        $this->setAccount($this->getAccount());
    }

    /**
     * @return Walletobjects
     */
    private function createWalletObject(): Walletobjects
    {
        return new Walletobjects(
            $this->account->getConnection()->getConfig()->getClient()
        );
    }

    /**
     * @param Walletobjects $walletService
     * @return LoyaltyClass|null
     */
    private function createLoyaltyClass(Walletobjects $walletService): ?LoyaltyClass
    {
        $loyaltyClass = new LoyaltyClass([
            'id' => $this->getWallet()->getClassId(),
            'issuerName' => $this->getWallet()->getIssuerName(),
            'programName' => $this->getWallet()->getProgramName(),
            'programLogo' => [
                'sourceUri' => [
                    'uri' => $this->getWallet()->getStyle()->getLogoUri()
                ]
            ],
            'reviewStatus' => $this->getWallet()->getStatus(),
            'logo' => [
                'sourceUri' => [
                    'uri' => $this->getWallet()->getStyle()->getLogoUri()
                ]
            ],
            'imageModulesData' => [
                [
                    'mainImage' => [
                        'sourceUri' => [
                            'uri' => $this->getWallet()->getStyle()->getImageUri()
                        ]
                    ]
                ]
            ],
            'hexBackgroundColor' => $this->getWallet()->getStyle()->getHexBackgroundColor(),
            'hexTextColor' => $this->getWallet()->getStyle()->getHexTextColor(),
        ]);

        try {
            // If available, it does not need to be inserted
            $currentLoyaltyClass = $this->findExistingLoyaltyClass($walletService);
            if ($currentLoyaltyClass instanceof LoyaltyClass) {
                return $currentLoyaltyClass;
            }
            return $walletService->loyaltyclass->insert($loyaltyClass);
        } catch (\Google\Service\Exception $e) {
            $this->error($e->getMessage());
        }

        return null;
    }

    /**
     * @param Walletobjects $walletService
     * @return LoyaltyClass|null
     * @throws \Google\Service\Exception
     */
    private function findExistingLoyaltyClass(
        Walletobjects $walletService
    ): ?LoyaltyClass
    {
        $loyaltyClasses = $walletService->loyaltyclass->listLoyaltyclass(
            [
                'issuerId' => $this->getAccount()->getIssuerId()
            ]
        )->getResources();

        if (count($loyaltyClasses) > 0) {
            foreach ($loyaltyClasses as $loyaltyClass) {
                if ($loyaltyClass->getId() === $this->getWallet()->getClassId()) {
                    return $loyaltyClass;
                }
            }
        }

        return null;
    }

    /**
     * @param Walletobjects $walletService
     * @return LoyaltyObject|null
     */
    private function createLoyaltyObject(Walletobjects $walletService): ?LoyaltyObject
    {
        $loyaltyObject = new LoyaltyObject([
            'id' => $this->getWallet()->getObjectId(),
            'classId' => $this->getWallet()->getClassId(),
            'state' => 'ACTIVE',
            'accountId' => $this->getWallet()->getWalletData()['accountId'],
            'accountName' => $this->getWallet()->getWalletData()['accountName'],
            'barcode' => [
                'type' => $this->getWallet()->getWalletData()['barcode']['type'],
                'value' => $this->getWallet()->getWalletData()['barcode']['value'],
                'alternateText' => $this->getWallet()->getWalletData()['barcode']['alternateText']
            ]
        ]);

        try {
            // If available, it does not need to be inserted
            $currentLoyaltyObject = $this->findExistingLoyaltyObject($walletService);
            if ($currentLoyaltyObject instanceof LoyaltyObject) {
                return $currentLoyaltyObject;
            }
            return $walletService->loyaltyobject->insert($loyaltyObject);
        } catch (\Google\Service\Exception $e) {
            $this->error($e->getMessage());
        }

        return null;
    }

    /**
     * @param Walletobjects $walletService
     * @return LoyaltyObject|null
     * @throws \Google\Service\Exception
     */
    private function findExistingLoyaltyObject(
        Walletobjects $walletService
    ): ?LoyaltyObject
    {
        $loyaltyObjects = $walletService->loyaltyobject->listLoyaltyobject(
            [
                'classId' => $this->getWallet()->getClassId()
            ]
        )->getResources();

        if (count($loyaltyObjects) > 0) {
            foreach ($loyaltyObjects as $loyaltyObject) {
                if ($loyaltyObject->getId() === $this->getWallet()->getClassId()) {
                    return $loyaltyObject;
                }
            }
        }

        return null;
    }

    /**
     * @param Account $account
     * @return void
     */
    public function setAccount(Account $account): void
    {
        $this->account = $account;
    }

    /**
     * @return Account
     */
    public function getAccount(): Account
    {
        return $this->account;
    }

    /**
     * @param Wallet $wallet
     * @return void
     */
    public function setWallet(Wallet $wallet): void
    {
        $this->wallet = $wallet;
    }

    /**
     * @return Wallet
     */
    public function getWallet(): Wallet
    {
        return $this->wallet;
    }
}