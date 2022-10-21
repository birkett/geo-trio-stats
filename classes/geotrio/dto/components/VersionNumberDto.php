<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\components;

use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;

final class VersionNumberDto extends AbstractSettableDto
{
    /**
     * @var int
     */
    protected int $major;

    /**
     * @var int
     */
    protected int $minor;
}
