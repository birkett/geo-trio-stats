<?php

declare(strict_types=1);

namespace GeoTrio\classes\geoapi\dto;

use GeoTrio\classes\geoapi\dto\attributes\DtoArrayValue;
use GeoTrio\classes\geoapi\dto\attributes\DtoValue;
use GeoTrio\classes\geoapi\dto\abstract\AbstractSettableDto;
use GeoTrio\classes\geoapi\dto\components\PowerResponseDto;
use GeoTrio\classes\geoapi\dto\components\SystemStatusDto;
use GeoTrio\classes\geoapi\dto\components\ZigbeeStatusDto;
use GeoTrio\classes\geoapi\dto\interfaces\GeoApiResponseInterface;
use GeoTrio\classes\geoapi\dto\traits\TtlTrait;

final class LiveDataResponse extends AbstractSettableDto implements GeoApiResponseInterface
{
    use TtlTrait;

    public const DEFAULT_ID = '00000000-0000-0000-0000-000000000000';

    /**
     * @var int
     */
    protected int $latestUtc = 0;

    /**
     * @var string
     */
    protected string $id = self::DEFAULT_ID;

    /**
     * @var PowerResponseDto[]
     */
    #[DtoArrayValue(PowerResponseDto::class)]
    protected array $power = [];

    /**
     * @var int
     */
    protected int $powerTimestamp = 0;

    /**
     * @var int
     */
    protected int $localTime = 0;

    /**
     * @var int
     */
    protected int $localTimeTimestamp = 0;

    /**
     * @TODO: Unknown structure. Needs implementing.
     */
    protected array $creditStatus = [];

    /**
     * @var int
     */
    protected int $creditStatusTimestamp = 0;

    /**
     * @TODO: Unknown structure. Needs implementing.
     */
    protected array $remainingCredit = [];

    /**
     * @var int
     */
    protected int $remainingCreditTimestamp = 0;

    /**
     * @var ZigbeeStatusDto|null
     */
    #[DtoValue(ZigbeeStatusDto::class)]
    protected ZigbeeStatusDto|null $zigbeeStatus = null;

    /**
     * @var int
     */
    protected int $zigbeeStatusTimestamp = 0;

    /**
     * @TODO: Unknown structure. Needs implementing.
     */
    protected array $emergencyCredit = [];

    /**
     * @var int
     */
    protected int $emergencyCreditTimestamp = 0;

    /**
     * @var SystemStatusDto[]
     */
    #[DtoArrayValue(SystemStatusDto::class)]
    protected array $systemStatus = [];

    /**
     * @var int
     */
    protected int $systemStatusTimestamp = 0;

    /**
     * @var float
     */
    protected float $temperature = 0.0;

    /**
     * @var int
     */
    protected int $temperatureTimestamp = 0;
}
