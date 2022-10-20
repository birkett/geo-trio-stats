<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto;

use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;
use GeoTrio\classes\geotrio\dto\components\PowerResponseDto;
use GeoTrio\classes\geotrio\dto\components\SystemStatusDto;
use GeoTrio\classes\geotrio\dto\components\ZigbeeStatusDto;

final class GeoTrioApiLiveDataResponse extends AbstractSettableDto
{
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
     * @var int
     */
    protected int $ttl;

    /**
     * @return int
     */
    public function getTtl(): int
    {
        return $this->ttl;
    }

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
                    if (is_array($value)) {
                        $this->power = [];

                        foreach ($value as $powerEntry) {
                            $this->power[] = new PowerResponseDto($powerEntry);
                        }
                    }

                    break;

                case 'systemStatus':
                    if (is_array($value)) {
                        $this->systemStatus = [];

                        foreach ($value as $statusEntry) {
                            $this->systemStatus[] = new SystemStatusDto($statusEntry);
                        }
                    }

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
