<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\components;

use GeoTrio\classes\geotrio\dto\attributes\DtoArrayValue;
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
    #[DtoArrayValue(DeviceDto::class)]
    protected array|null $devices;

    /**
     * @var string
     */
    protected string $systemId;
}
