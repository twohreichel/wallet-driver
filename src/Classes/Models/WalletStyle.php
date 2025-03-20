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
     * @var string $thumbnailUri2x contains the thumbnail2x uri that be displayed on your wallet
     */
    private string $thumbnailUri2x = '';

    /**
     * @var string $stripUri contains the $stripUri uri that be displayed on your wallet
     */
    private string $stripUri = '';

    /**
     * @var string $stripUri2x contains the $stripUri2x uri that be displayed on your wallet
     */
    private string $stripUri2x = '';

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
     * @param string $thumbnailUri2x
     * @param string $stripUri
     * @param string $stripUri2x
     * @param string $hexBackgroundColor
     * @param string $hexTextColor
     */
    public function __construct(
        string $logoUri,
        string $imageUri,
        string $iconUri,
        string $thumbnailUri,
        string $thumbnailUri2x,
        string $stripUri,
        string $stripUri2x,
        string $hexBackgroundColor,
        string $hexTextColor
    )
    {
        $this->setLogoUri($logoUri);
        $this->setImageUri($imageUri);
        $this->setIconUri($iconUri);
        $this->setThumbnailUri($thumbnailUri);
        $this->setThumbnailUri2x($thumbnailUri2x);
        $this->setStripUri($stripUri);
        $this->setStripUri2x($stripUri2x);
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

    public function getThumbnailUri2x(): string
    {
        return $this->thumbnailUri2x;
    }

    public function setThumbnailUri2x(string $thumbnailUri2x): void
    {
        $this->thumbnailUri2x = $thumbnailUri2x;
    }

    public function getStripUri(): string
    {
        return $this->stripUri;
    }

    public function setStripUri(string $stripUri): void
    {
        $this->stripUri = $stripUri;
    }

    public function getStripUri2x(): string
    {
        return $this->stripUri2x;
    }

    public function setStripUri2x(string $stripUri2x): void
    {
        $this->stripUri2x = $stripUri2x;
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