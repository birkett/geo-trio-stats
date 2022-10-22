<?php

declare(strict_types=1);

namespace GeoTrio\classes\geoapi\dto\components;

use GeoTrio\classes\geoapi\dto\attributes\DtoArrayValue;
use GeoTrio\classes\geoapi\dto\abstract\AbstractSettableDto;

final class SystemDetailDto extends AbstractSettableDto
{
    public const DEFAULT_NAME = 'System Name';
    public const DEFAULT_ID = '00000000-0000-0000-0000-000000000000';

    protected string $name = self::DEFAULT_NAME;

    /**
     * @var DeviceDto[]
     */
    #[DtoArrayValue(DeviceDto::class)]
    protected array $devices = [];

    /**
     * @var string
     */
    protected string $systemId = self::DEFAULT_ID;
}
