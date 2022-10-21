<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\components;

use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;

final class SystemDetailDto extends AbstractSettableDto
{
    protected const PROPERTY_DTO_ARRAY_MAP = [
        'devices' => DeviceDto::class,
    ];

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
}
