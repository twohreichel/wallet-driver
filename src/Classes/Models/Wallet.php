<?php

declare(strict_types=1);

namespace TWOH\WalletDriver\Models;

class Wallet
{
    /**
     * @var string $classId contains the class id of your wallet
     */
    private string $classId = '';

    /**
     * @var string $objectId contains the object id of your wallet
     */
    private string $objectId = '';

    /**
     * @var string $issuerName contains the issuer name for your wallet
     */
    private string $issuerName = '';

    /**
     * @var string $programName contains the program name for your wallet
     */
    private string $programName = '';

    /**
     * @var string $type contains the type of your wallet
     */
    private string $type = '';

    /**
     * @var string $status contains the status of your wallet
     */
    private string $status = '';

    /**
     * @var array $walletData contains the data that be displayed on your wallet
     */
    private array $walletData = [];

    /**
     * @var array $walletFields contains the wallet fields
     */
    private array $walletFields = [];

    /**
     * @var WalletStyle $style contains the wallet stylings
     */
    private WalletStyle $style;

    /**
     * @param string $classId
     * @param string $objectId
     * @param string $issuerName
     * @param string $programName
     * @param string $type
     * @param string $status
     * @param array $walletData
     * @param array $walletFields
     * @param WalletStyle $style
     */
    public function __construct(
        string $classId,
        string $objectId,
        string $issuerName,
        string $programName,
        string $type,
        string $status,
        array $walletData,
        array $walletFields,
        WalletStyle $style
    )
    {
        $this->setClassId($classId);
        $this->setObjectId($objectId);
        $this->setIssuerName($issuerName);
        $this->setProgramName($programName);
        $this->setType($type);
        $this->setStatus($status);
        $this->setWalletData($walletData);
        $this->setWalletFields($walletFields);
        $this->setStyle($style);
    }

    public function getClassId(): string
    {
        return $this->classId;
    }

    public function setClassId(string $classId): void
    {
        $this->classId = $classId;
    }

    public function getObjectId(): string
    {
        return $this->objectId;
    }

    public function setObjectId(string $objectId): void
    {
        $this->objectId = $objectId;
    }

    public function getIssuerName(): string
    {
        return $this->issuerName;
    }

    public function setIssuerName(string $issuerName): void
    {
        $this->issuerName = $issuerName;
    }

    public function getProgramName(): string
    {
        return $this->programName;
    }

    public function setProgramName(string $programName): void
    {
        $this->programName = $programName;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getWalletData(): array
    {
        return $this->walletData;
    }

    public function setWalletData(array $walletData): void
    {
        $this->walletData = $walletData;
    }

    public function getStyle(): WalletStyle
    {
        return $this->style;
    }

    public function setStyle(WalletStyle $style): void
    {
        $this->style = $style;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getWalletFields(): array
    {
        return $this->walletFields;
    }

    public function setWalletFields(array $walletFields): void
    {
        $this->walletFields = $walletFields;
    }
}