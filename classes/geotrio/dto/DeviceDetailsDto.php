<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto;

use GeoTrio\classes\geotrio\dto\attributes\DtoArrayValue;
use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;
use GeoTrio\classes\geotrio\dto\components\SystemDetailDto;
use GeoTrio\classes\geotrio\dto\components\SystemRoleDto;

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
