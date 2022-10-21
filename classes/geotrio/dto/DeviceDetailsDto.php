<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto;

use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;
use GeoTrio\classes\geotrio\dto\components\SystemDetailDto;
use GeoTrio\classes\geotrio\dto\components\SystemRoleDto;

final class DeviceDetailsDto extends AbstractSettableDto
{
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

    /**
     * @param array $data
     *
     * @return void
     */
    public function set(array $data): void
    {
        foreach ($data as $key => $value) {
            switch ($key) {
                case 'systemRoles':
                    if (is_array($value)) {
                        $this->systemRoles = [];

                        foreach ($value as $role) {
                            $this->systemRoles[] = new SystemRoleDto($role);
                        }
                    }

                    break;

                case 'systemDetails':
                    if (is_array($value)) {
                        $this->systemDetails = [];

                        foreach ($value as $detail) {
                            $this->systemDetails[] = new SystemDetailDto($detail);
                        }
                    }

                    break;

                default:
                    $this->{$key} = $value;
            }
        }
    }
}
