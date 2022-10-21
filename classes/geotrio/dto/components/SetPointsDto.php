<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\components;

use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;

final class SetPointsDto extends AbstractSettableDto
{
    protected const PROPERTY_DTO_MAP = [
        'daySetPoint' => SetPointDto::class,
        'nightSetPoint' => SetPointDto::class,
    ];

    /**
     * @var SetPointDto
     */
    protected SetPointDto $daySetPoint;

    /**
     * @var SetPointDto
     */
    protected SetPointDto $nightSetPoint;
}
