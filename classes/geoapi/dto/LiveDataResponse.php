<?php

declare(strict_types=1);

namespace GeoTrioStats\classes\geoapi\dto;

use GeoTrioStats\classes\geoapi\dto\attributes\DtoArrayValue;
use GeoTrioStats\classes\geoapi\dto\attributes\DtoValue;
use GeoTrioStats\classes\geoapi\dto\abstract\AbstractSettableDto;
use GeoTrioStats\classes\geoapi\dto\components\PowerResponseDto;
use GeoTrioStats\classes\geoapi\dto\components\SystemStatusDto;
use GeoTrioStats\classes\geoapi\dto\components\ZigbeeStatusDto;
use GeoTrioStats\classes\geoapi\dto\enum\Guid;
use GeoTrioStats\classes\geoapi\dto\interfaces\GeoApiResponseInterface;
use GeoTrioStats\classes\geoapi\dto\traits\TtlTrait;

final class LiveDataResponse extends AbstractSettableDto implements GeoApiResponseInterface
{
    use TtlTrait;

    /**
     * @var int
     */
    protected int $latestUtc = 0;

    /**
     * @var string
     */
    protected string $id = Guid::DEFAULT;

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
