<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\components;

use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;
use GeoTrio\classes\geotrio\dto\attributes\DtoValue;

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
    #[DtoValue(VersionNumberDto::class)]
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
