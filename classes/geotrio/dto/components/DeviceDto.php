<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\components;

use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;

final class DeviceDto extends AbstractSettableDto
{
    /**
     * @var string
     */
    protected string $deviceType;

    /**
     * @var int
     */
    protected int $sensorType;

    /**
     * @var int
     */
    protected int $nodeId;

    /**
     * @var VersionNumberDto
     */
    protected VersionNumberDto $versionNumber;

    /**
     * @var int
     */
    protected int $pairedTimestamp;

    /**
     * @var string
     */
    protected string $pairingCode;

    /**
     * @var bool
     */
    protected bool $updateRequired;

    /**
     * @param array $data
     *
     * @return void
     */
    public function set(array $data): void
    {
        foreach ($data as $key => $value) {
            switch ($key) {
                case 'versionNumber':
                    if (is_array($value)) {
                        $this->versionNumber = new VersionNumberDto($value);
                    }

                    break;

                default:
                    $this->{$key} = $value;
            }
        }
    }
}
