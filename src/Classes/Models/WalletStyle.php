<?php

namespace TWOH\WalletDriver\Models;

class WalletStyle
{
    /**
     * @var string $logoUri contains the logo uri that be displayed on your wallet
     */
    private string $logoUri = '';

    /**
     * @var string $imageUri contains the image uri that be displayed on your wallet
     */
    private string $imageUri = '';

    /**
     * @var string $iconUri contains the icon uri that be displayed on your wallet
     */
    private string $iconUri = '';

    /**
     * @var string $thumbnailUri contains the thumbnail uri that be displayed on your wallet
     */
    private string $thumbnailUri = '';

    /**
     * @var string $hexBackgroundColor contains the background color that be displayed on your wallet
     */
    private string $hexBackgroundColor = '';

    /**
     * @var string $hexTextColor contains the text color that be displayed on your wallet
     */
    private string $hexTextColor = '';

    /**
     * @param string $logoUri
     * @param string $imageUri
     * @param string $iconUri
     * @param string $thumbnailUri
     * @param string $hexBackgroundColor
     * @param string $hexTextColor
     */
    public function __construct(
        string $logoUri,
        string $imageUri,
        string $iconUri,
        string $thumbnailUri,
        string $hexBackgroundColor,
        string $hexTextColor
    )
    {
        $this->setLogoUri($logoUri);
        $this->setImageUri($imageUri);
        $this->setIconUri($iconUri);
        $this->setThumbnailUri($thumbnailUri);
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

    public function getIconUri(): string
    {
        return $this->iconUri;
    }

    public function setIconUri(string $iconUri): void
    {
        $this->iconUri = $iconUri;
    }

    public function getThumbnailUri(): string
    {
        return $this->thumbnailUri;
    }

    public function setThumbnailUri(string $thumbnailUri): void
    {
        $this->thumbnailUri = $thumbnailUri;
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