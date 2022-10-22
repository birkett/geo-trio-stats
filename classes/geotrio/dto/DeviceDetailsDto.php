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
     * @var SystemRoleDto[]|null
     */
    #[DtoArrayValue(SystemRoleDto::class)]
    protected array|null $systemRoles;

    /**
     * @var SystemDetailDto[]|null
     */
    #[DtoArrayValue(SystemDetailDto::class)]
    protected array|null $systemDetails;

    /**
     * @return SystemRoleDto[]
     */
    public function getSystemRoles(): array
    {
        return $this->systemRoles;
    }
}
