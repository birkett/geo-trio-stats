<?php

declare(strict_types=1);

namespace GeoTrioStats\classes\geoapi\dto\components;

use GeoTrioStats\classes\geoapi\dto\abstract\AbstractSettableDto;
use GeoTrioStats\classes\geoapi\dto\enum\Guid;

final class SystemRoleDto extends AbstractSettableDto
{
    /**
     * @var string
     */
    protected string $name = Guid::DEFAULT;

    /**
     * @var string
     */
    protected string $systemId = Guid::DEFAULT;

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
