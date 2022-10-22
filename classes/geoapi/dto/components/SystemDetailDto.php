<?php

declare(strict_types=1);

namespace GeoTrioStats\classes\geoapi\dto\components;

use GeoTrioStats\classes\geoapi\dto\attributes\DtoArrayValue;
use GeoTrioStats\classes\geoapi\dto\abstract\AbstractSettableDto;
use GeoTrioStats\classes\geoapi\dto\enum\Guid;

final class SystemDetailDto extends AbstractSettableDto
{
    /**
     * @var string
     */
    protected string $name = Guid::DEFAULT;

    /**
     * @var DeviceDto[]
     */
    #[DtoArrayValue(DeviceDto::class)]
    protected array $devices = [];

    /**
     * @var string
     */
    protected string $systemId = Guid::DEFAULT;
}
