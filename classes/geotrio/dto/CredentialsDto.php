<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto;

use JsonSerializable;

final class CredentialsDto implements JsonSerializable
{
    /**
     * @var string
     */
    private string $identity;

    /**
     * @var string
     */
    private string $password;

    /**
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username, string $password)
    {
        $this->identity = $username;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->identity;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
