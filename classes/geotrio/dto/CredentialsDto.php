<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto;

use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;

final class CredentialsDto extends AbstractSettableDto
{
    /**
     * @var string
     */
    protected string $identity;

    /**
     * @var string
     */
    protected string $password;

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
