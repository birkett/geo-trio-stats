<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto;

use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;
use GeoTrio\classes\geotrio\dto\components\PowerResponseDto;
use GeoTrio\classes\geotrio\dto\components\SystemStatusDto;
use GeoTrio\classes\geotrio\dto\components\ZigbeeStatusDto;
use GeoTrio\classes\geotrio\dto\interfaces\GeoTrioApiResponseInterface;
use GeoTrio\classes\geotrio\dto\traits\TtlTrait;

final class GeoTrioApiLiveDataResponse extends AbstractSettableDto implements GeoTrioApiResponseInterface
{
    use TtlTrait;

    protected const PROPERTY_DTO_ARRAY_MAP = [
        'power' => PowerResponseDto::class,
        'systemStatus' => SystemStatusDto::class,
    ];

    protected const PROPERTY_DTO_MAP = [
        'zigbeeStatus' => ZigbeeStatusDto::class,
    ];

    /***
     * @var int
     */
    protected int $latestUtc;

    /**
     * @var string
     */
    protected string $id;

    /**
     * @var PowerResponseDto[]|null
     */
    protected array|null $power;

    /**
     * @var int
     */
    protected int $powerTimestamp;

    /**
     * @var int
     */
    protected int $localTime;

    /**
     * @var int
     */
    protected int $localTimeTimestamp;

    /**
     * @TODO: Unknown structure. Needs implementing.
     *
     * @var array|null
     */
    protected array|null $creditStatus;

    /**
     * @var int
     */
    protected int $creditStatusTimestamp;

    /**
     * @TODO: Unknown structure. Needs implementing.
     *
     * @var array|null
     */
    protected array|null $remainingCredit;

    /**
     * @var int
     */
    protected int $remainingCreditTimestamp;

    /**
     * @var ZigbeeStatusDto|null
     */
    protected ZigbeeStatusDto|null $zigbeeStatus;

    /**
     * @var int
     */
    protected int $zigbeeStatusTimestamp;

    /**
     * @TODO: Unknown structure. Needs implementing.
     *
     * @var array|null
     */
    protected array|null $emergencyCredit;

    /**
     * @var int
     */
    protected int $emergencyCreditTimestamp;

    /**
     * @var SystemStatusDto[]|null
     */
    protected array|null $systemStatus;

    /**
     * @var int
     */
    protected int $systemStatusTimestamp;

    /**
     * @var float
     */
    protected float $temperature;

    /**
     * @var int
     */
    protected int $temperatureTimestamp;
}
