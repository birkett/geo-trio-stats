<?php

declare(strict_types=1);

namespace GeoTrioStats\classes\geoapi\dto\components;

use GeoTrioStats\classes\geoapi\dto\abstract\AbstractSettableDto;

final class SystemStatusDto extends AbstractSettableDto
{
    public const COMPONENT_DISPLAY = 'DISPLAY';
    public const COMPONENT_ZIGBEE = 'ZIGBEE';
    public const COMPONENT_ELECTRICITY = 'ELECTRICITY';
    public const COMPONENT_GAS = 'GAS';
    public const STATUS_OK = 'STATUS_OK';
    public const ERROR_CODE_NONE = 'ERROR_CODE_NONE';

    /**
     * @var string
     */
    protected string $component = self::COMPONENT_DISPLAY;

    /**
     * @var string
     */
    protected string $statusType = self::STATUS_OK;

    /**
     * @var string
     */
    protected string $systemErrorCode = self::ERROR_CODE_NONE;

    /**
     * @var int
     */
    protected int $systemErrorNumber = 0;
}
