<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\components;

use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;

final class SystemRoleDto extends AbstractSettableDto
{
    /**
     * @var string
     */
    protected string $name;

    /**
     * @var string
     */
    protected string $systemId;

    /**
     * @var string[]
     */
    protected array $roles;

    /**
     * @return string
     */
    public function getSystemId(): string
    {
        return $this->systemId;
    }
}
