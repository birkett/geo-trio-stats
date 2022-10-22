<?php

declare(strict_types=1);

namespace GeoTrioStats\classes\geoapi\dto\components;

use GeoTrioStats\classes\geoapi\dto\abstract\AbstractSettableDto;
use GeoTrioStats\classes\geoapi\dto\attributes\DtoValue;

final class DeviceDto extends AbstractSettableDto
{
    public const DEVICE_TYPE_TRIO_II = 'TRIO_II_TB_GEO';
    public const DEVICE_TYPE_WIFI = 'WIFI_MODULE';
    public const DEFAULT_PAIRING_CODE = 'AAAAA';

    /**
     * @var string
     */
    protected string $deviceType = self::DEVICE_TYPE_TRIO_II;

    /**
     * @var int
     */
    protected int $sensorType = 0;

    /**
     * @var int
     */
    protected int $nodeId = 0;

    /**
     * @var VersionNumberDto|null
     */
    #[DtoValue(VersionNumberDto::class)]
    protected VersionNumberDto|null $versionNumber = null;

    /**
     * @var int
     */
    protected int $pairedTimestamp = 0;

    /**
     * @var string
     */
    protected string $pairingCode = self::DEFAULT_PAIRING_CODE;

    /**
     * @var bool
     */
    protected bool $updateRequired = false;
}
