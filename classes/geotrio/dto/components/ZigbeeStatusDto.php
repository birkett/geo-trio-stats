<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\components;

use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;

final class ZigbeeStatusDto extends AbstractSettableDto
{
    /**
     * @var string
     */
    protected string $electricityClusterStatus;

    /**
     * @var string
     */
    protected string $gasClusterStatus;

    /**
     * @var string
     */
    protected string $hanStatus;

    /**
     * @var int
     */
    protected int $networkRssi;
}
