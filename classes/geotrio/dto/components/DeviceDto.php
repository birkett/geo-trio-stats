<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\components;

use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;

final class DeviceDto extends AbstractSettableDto
{
    protected const PROPERTY_DTO_MAP = [
        'versionNumber' => VersionNumberDto::class,
    ];

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
}
