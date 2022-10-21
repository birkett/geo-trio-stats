<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\components;

use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;

final class SystemDetailDto extends AbstractSettableDto
{
    /**
     * @var string
     */
    protected string $name;

    /**
     * @var DeviceDto[]|null
     */
    protected array|null $devices;

    /**
     * @var string
     */
    protected string $systemId;

    /**
     * @param array $data
     *
     * @return void
     */
    public function set(array $data): void
    {
        foreach ($data as $key => $value) {
            switch ($key) {
                case 'devices':
                    if (is_array($value)) {
                        $this->devices = [];

                        foreach ($value as $device) {
                            $this->devices[] = new DeviceDto($device);
                        }
                    }

                    break;

                default:
                    $this->{$key} = $value;
            }
        }
    }
}
