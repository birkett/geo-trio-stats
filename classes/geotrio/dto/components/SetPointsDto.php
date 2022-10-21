<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\components;

use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;

final class SetPointsDto extends AbstractSettableDto
{
    /**
     * @var SetPointDto
     */
    protected SetPointDto $daySetPoint;

    /**
     * @var SetPointDto
     */
    protected SetPointDto $nightSetPoint;

    /**
     * @param array $data
     *
     * @return void
     */
    protected function set(array $data): void
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $this->{$key} = new SetPointDto($value);
            }
        }
    }
}
