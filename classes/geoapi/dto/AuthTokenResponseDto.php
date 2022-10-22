<?php

declare(strict_types=1);

namespace GeoTrioStats\classes\geoapi\dto;

use GeoTrioStats\classes\geoapi\dto\abstract\AbstractSettableDto;
use GeoTrioStats\classes\geoapi\dto\enum\Guid;

final class AuthTokenResponseDto extends AbstractSettableDto
{
    /**
     * @var string
     */
    protected string $username = Guid::DEFAULT;

    /**
     * @var string
     */
    protected string $email = '';

    /**
     * @var string
     */
    protected string $displayName = '';

    /**
     * @var bool
     */
    protected bool $validated = false;

    /**
     * @var string
     */
    protected string $accessToken = '';

    /**
     * @return bool
     */
    public function hasToken(): bool
    {
        return !empty($this->accessToken);
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }
}
