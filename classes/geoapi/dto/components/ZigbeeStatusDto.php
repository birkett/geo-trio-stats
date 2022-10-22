<?php

declare(strict_types=1);

namespace GeoTrio\classes\geoapi\dto\components;

use GeoTrio\classes\geoapi\dto\abstract\AbstractSettableDto;

final class ZigbeeStatusDto extends AbstractSettableDto
{
    public const STATUS_CONNECTED = 'CONNECTED';

    /**
     * @var string
     */
    protected string $electricityClusterStatus = self::STATUS_CONNECTED;

    /**
     * @var string
     */
    protected string $gasClusterStatus = self::STATUS_CONNECTED;

    /**
     * @var string
     */
    protected string $hanStatus = self::STATUS_CONNECTED;

    /**
     * @var int
     */
    protected int $networkRssi = 0;
}
