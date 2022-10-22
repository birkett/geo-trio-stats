<?php

declare(strict_types=1);

namespace GeoTrioStats\classes\geoapi\dto\components;

use GeoTrioStats\classes\geoapi\dto\attributes\DtoValue;
use GeoTrioStats\classes\geoapi\dto\abstract\AbstractSettableDto;

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
