<?php

namespace TWOH\WalletDriver\Models;

class WalletStyle
{
    /**
     * @var string contains the logo uri that be displayed on your wallet
     */
    protected string $logoUri = '';

    /**
     * @var string contains the image uri that be displayed on your wallet
     */
    protected string $imageUri = '';

    /**
     * @var string contains the background color that be displayed on your wallet
     */
    protected string $hexBackgroundColor = '';

    /**
     * @var string contains the text color that be displayed on your wallet
     */
    protected string $hexTextColor = '';

    /**
     * @param string $logoUri
     * @param string $imageUri
     * @param string $hexBackgroundColor
     * @param string $hexTextColor
     */
    public function __construct(
        string $logoUri,
        string $imageUri,
        string $hexBackgroundColor,
        string $hexTextColor
    )
    {
        $this->setLogoUri($logoUri);
        $this->setImageUri($imageUri);
        $this->setHexBackgroundColor($hexBackgroundColor);
        $this->setHexTextColor($hexTextColor);
    }

    public function getLogoUri(): string
    {
        return $this->logoUri;
    }

    public function setLogoUri(string $logoUri): void
    {
        $this->logoUri = $logoUri;
    }

    public function getImageUri(): string
    {
        return $this->imageUri;
    }

    public function setImageUri(string $imageUri): void
    {
        $this->imageUri = $imageUri;
    }

    public function getHexBackgroundColor(): string
    {
        return $this->hexBackgroundColor;
    }

    public function setHexBackgroundColor(string $hexBackgroundColor): void
    {
        $this->hexBackgroundColor = $hexBackgroundColor;
    }

    public function getHexTextColor(): string
    {
        return $this->hexTextColor;
    }

    public function setHexTextColor(string $hexTextColor): void
    {
        $this->hexTextColor = $hexTextColor;
    }
}