<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto;

use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;

final class AuthTokenResponseDto extends AbstractSettableDto
{
    /**
     * @var string|null
     */
    protected string|null $accessToken;

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
