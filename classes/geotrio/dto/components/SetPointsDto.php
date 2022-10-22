<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\components;

use GeoTrio\classes\geotrio\dto\attributes\DtoValue;
use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;

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
