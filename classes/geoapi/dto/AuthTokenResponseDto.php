<?php

declare(strict_types=1);

namespace GeoTrio\classes\geoapi\dto;

use GeoTrio\classes\geoapi\dto\abstract\AbstractSettableDto;

final class AuthTokenResponseDto extends AbstractSettableDto
{
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
