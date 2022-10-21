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

    /**
     * @param array $data
     *
     * @return void
     */
    protected function set(array $data): void
    {
        foreach ($data as $key => $value) {
            switch ($key) {
                case 'power':
                    $this->setDtoArray($key, PowerResponseDto::class, $value);

                    break;

                case 'systemStatus':
                    $this->setDtoArray($key, SystemStatusDto::class, $value);

                    break;

                case 'zigbeeStatus':
                    if (is_array($value)) {
                        $this->zigbeeStatus = new ZigbeeStatusDto($value);
                    }

                    break;

                default:
                    $this->{$key} = $value;
            }
        }
    }
}
