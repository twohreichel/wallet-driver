<?php

declare(strict_types=1);

namespace TWOH\WalletDriver\Drivers;

use PKPass\PKPass;
use PKPass\PKPassException;
use Random\RandomException;
use TWOH\WalletDriver\Exceptions\PkpassGenerationFailedException;
use TWOH\WalletDriver\Models\Account;
use TWOH\WalletDriver\Models\Wallet;

class AppleWalletDriver implements DriverInterface
{
    /**
     * @var Account
     */
    protected Account $account;

    /**
     * @var Wallet
     */
    protected Wallet $wallet;

    /**
     * @var PKPass
     */
    protected PKPass $pass;

    /**
     * @return string
     * @throws PKPassException
     * @throws RandomException
     * @throws PkpassGenerationFailedException
     */
    public function buildWallet(): string
    {
        $this->connect();

        $pkPassContent = $this->createPKPassFile();

        if (!is_dir($this->getAccount()->getApplePKPassStorePath()) && !mkdir($this->getAccount()->getApplePKPassStorePath(), 0777, true) && !is_dir($this->getAccount()->getApplePKPassStorePath())) {
            throw new PkpassGenerationFailedException(sprintf('Directory "%s" was not created', $this->getAccount()->getApplePKPassStorePath()));
        }

        // if downloadable is false, then build pkpass file and return its path
        if (!$this->getAccount()->isDownloadable() && $pkPassContent !== '') {
            $pkPassFile = $this->getAccount()->getApplePKPassStorePath()
                . $this->getWallet()->getWalletData()['accountId']
                . '_' . time()
                . '.pkpass';

            if (!file_put_contents($pkPassFile, $pkPassContent, LOCK_EX)) {
                throw new PkpassGenerationFailedException('PKPass file could not be written to ' . $pkPassFile);
            }

            return $pkPassFile;
        }

        return '';
    }

    /**
     * @return void
     */
    public function connect(): void
    {
        $this->setPass(
            new PKPass(
                $this->getAccount()->getAppleCertificatePath(),
                $this->getAccount()->getAppleCertificatePassword()
            )
        );
    }

    /**
     * @return string
     * @throws PKPassException
     * @throws RandomException
     */
    private function createPKPassFile(): string
    {
        $id = random_int(100000, 999999) . '-' . random_int(100, 999) . '-' . random_int(100, 999);

        // Pass content
        $data = [
            'description' => $this->getWallet()->getProgramName(),
            'formatVersion' => 1,
            'organizationName' => $this->getWallet()->getIssuerName(),
            'passTypeIdentifier' => $this->account->getApplePassTypeIdentifier(),
            'serialNumber' => $id,
            'teamIdentifier' => $this->getAccount()->getAppleTeamIdentifier(), // Change this!
            'card' => [
                'primaryFields' => [
                    [
                        'key' => 'name',
                        'label' => 'Name',
                        'value' => $this->getWallet()->getWalletData()['accountName'],
                    ],
                ],
                'backFields' => [
                    [
                        'key' => 'id',
                        'label' => 'ID',
                        'value' => $this->getWallet()->getWalletData()['accountId'],
                    ],
                ],
            ],
            'backgroundColor' => $this->getWallet()->getStyle()->getHexBackgroundColor(),
            'logoText' => '',
            'relevantDate' => date('Y-m-d\TH:i:sP')
        ];

        if (!empty($this->getWallet()->getWalletData()['barcode']['type'])) {
            $data['barcode'] = [
                'format' => $this->getWallet()->getWalletData()['barcode']['type'],
                'message' => $this->getWallet()->getWalletData()['barcode']['value'],
                'altText' => $this->getWallet()->getWalletData()['barcode']['alternateText'],
                'messageEncoding' => 'iso-8859-1',
            ];
        }

        $this->getPass()->setData($data);

        // Add files to the pass package
        if (!empty($this->getWallet()->getStyle()->getIconUri())) {
            $this->getPass()->addFile($this->getWallet()->getStyle()->getIconUri(), 'icon.png');
        }

        if (!empty($this->getWallet()->getStyle()->getLogoUri())) {
            $this->getPass()->addFile($this->getWallet()->getStyle()->getLogoUri(), 'logo.png');
        }

        if (!empty($this->getWallet()->getStyle()->getImageUri())) {
            $this->getPass()->addFile($this->getWallet()->getStyle()->getImageUri(), 'background.png');
        }

        // Create and output the pass
        return $this->getPass()->create($this->getAccount()->isDownloadable());
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

    public function getPass(): PKPass
    {
        return $this->pass;
    }

    public function setPass(PKPass $pass): void
    {
        $this->pass = $pass;
    }
}