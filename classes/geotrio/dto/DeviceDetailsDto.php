<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto;

use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;
use GeoTrio\classes\geotrio\dto\components\SystemDetailDto;
use GeoTrio\classes\geotrio\dto\components\SystemRoleDto;

final class DeviceDetailsDto extends AbstractSettableDto
{
    protected const PROPERTY_DTO_ARRAY_MAP = [
        'systemRoles' => SystemRoleDto::class,
        'systemDetails' => SystemDetailDto::class,
    ];

    /**
     * @var SystemRoleDto[]|null
     */
    protected array|null $systemRoles;

    /**
     * @var SystemDetailDto[]|null
     */
    protected array|null $systemDetails;

    /**
     * @return SystemRoleDto[]
     */
    public function getSystemRoles(): array
    {
        return $this->systemRoles;
    }
}
