<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\components;

use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;

final class SystemStatusDto extends AbstractSettableDto
{
    /**
     * @var string
     */
    protected string $component;

    /**
     * @var string
     */
    protected string $statusType;

    /**
     * @var string
     */
    protected string $systemErrorCode;

    /**
     * @var int
     */
    protected int $systemErrorNumber;
}
