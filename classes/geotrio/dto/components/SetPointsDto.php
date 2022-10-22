<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\components;

use GeoTrio\classes\geotrio\dto\attributes\DtoValue;
use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;

final class SetPointsDto extends AbstractSettableDto
{
    /**
     * @var SetPointDto
     */
    #[DtoValue(SetPointDto::class)]
    protected SetPointDto $daySetPoint;

    /**
     * @var SetPointDto
     */
    #[DtoValue(SetPointDto::class)]
    protected SetPointDto $nightSetPoint;
}
