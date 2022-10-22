<?php

declare(strict_types=1);

namespace GeoTrioStats\classes\geoapi\dto;

use GeoTrioStats\classes\geoapi\dto\attributes\DtoArrayValue;
use GeoTrioStats\classes\geoapi\dto\abstract\AbstractSettableDto;
use GeoTrioStats\classes\geoapi\dto\components\SystemDetailDto;
use GeoTrioStats\classes\geoapi\dto\components\SystemRoleDto;

final class DeviceDetailsDto extends AbstractSettableDto
{
    /**
     * @var SystemRoleDto[]
     */
    #[DtoArrayValue(SystemRoleDto::class)]
    protected array $systemRoles = [];

    /**
     * @var SystemDetailDto[]
     */
    #[DtoArrayValue(SystemDetailDto::class)]
    protected array $systemDetails = [];

    /**
     * @return SystemRoleDto[]
     */
    public function getSystemRoles(): array
    {
        return $this->systemRoles;
    }
}
