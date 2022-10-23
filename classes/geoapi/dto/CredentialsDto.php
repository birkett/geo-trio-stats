<?php

declare(strict_types=1);

namespace GeoTrioStats\classes\geoapi\dto;

use GeoTrioStats\classes\geoapi\dto\abstract\AbstractSettableDto;

final class CredentialsDto extends AbstractSettableDto
{
    /**
     * @var string
     */
    protected readonly string $identity;

    /**
     * @var string
     */
    protected readonly string $password;

    /**
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username, string $password)
    {
        $this->identity = $username;
        $this->password = $password;

        parent::__construct([]);
    }
}
