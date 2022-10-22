<?php

declare(strict_types=1);

namespace GeoTrio\classes\geoapi\dto;

use GeoTrio\classes\geoapi\dto\attributes\DtoArrayValue;
use GeoTrio\classes\geoapi\dto\abstract\AbstractSettableDto;
use GeoTrio\classes\geoapi\dto\components\SystemDetailDto;
use GeoTrio\classes\geoapi\dto\components\SystemRoleDto;

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
