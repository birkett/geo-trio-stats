<?php

declare(strict_types=1);

namespace GeoTrio\classes\geoapi\dto\components;

use GeoTrio\classes\geoapi\dto\attributes\DtoValue;
use GeoTrio\classes\geoapi\dto\abstract\AbstractSettableDto;

final class SetPointsDto extends AbstractSettableDto
{
    /**
     * @var SetPointDto|null
     */
    #[DtoValue(SetPointDto::class)]
    protected SetPointDto|null $daySetPoint = null;

    /**
     * @var SetPointDto|null
     */
    #[DtoValue(SetPointDto::class)]
    protected SetPointDto|null $nightSetPoint = null;
}
