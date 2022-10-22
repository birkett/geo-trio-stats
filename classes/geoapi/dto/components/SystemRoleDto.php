<?php

declare(strict_types=1);

namespace GeoTrio\classes\geoapi\dto\components;

use GeoTrio\classes\geoapi\dto\abstract\AbstractSettableDto;

final class SystemRoleDto extends AbstractSettableDto
{
    public const DEFAULT_NAME = '00000000-0000-0000-0000-000000000000';
    public const DEFAULT_ID = '00000000-0000-0000-0000-000000000000';

    protected string $name = self::DEFAULT_NAME;

    /**
     * @var string
     */
    protected string $systemId = self::DEFAULT_ID;

    /**
     * @var string[]
     */
    protected array $roles = [];

    /**
     * @return string
     */
    public function getSystemId(): string
    {
        return $this->systemId;
    }
}
