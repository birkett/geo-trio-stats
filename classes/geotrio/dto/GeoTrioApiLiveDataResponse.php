<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto;

use JsonSerializable;
use GeoTrio\traits\SetToFromArrayTrait;

final class GeoTrioApiLiveDataResponse implements JsonSerializable
{
    use SetToFromArrayTrait;

    /***
     * @var int
     */
    private int $latestUtc;

    /**
     * @var string
     */
    private string $id;

    /**
     * @var PowerResponseDto[]|null
     */
    private array|null $power;

    /**
     * @var int
     */
    private int $powerTimestamp;

    /**
     * @var int
     */
    private int $localTime;

    /**
     * @var int
     */
    private int $localTimeTimestamp;

    /**
     * @TODO: Unknown structure. Needs implementing.
     *
     * @var array|null
     */
    private array|null $creditStatus;

    /**
     * @var int
     */
    private int $creditStatusTimestamp;

    /**
     * @TODO: Unknown structure. Needs implementing.
     *
     * @var array|null
     */
    private array|null $remainingCredit;

    /**
     * @var int
     */
    private int $remainingCreditTimestamp;

    /**
     * @var ZigbeeStatusDto|null
     */
    private ZigbeeStatusDto|null $zigbeeStatus;

    /**
     * @var int
     */
    private int $zigbeeStatusTimestamp;

    /**
     * @TODO: Unknown structure. Needs implementing.
     *
     * @var array|null
     */
    private array|null $emergencyCredit;

    /**
     * @var int
     */
    private int $emergencyCreditTimestamp;

    /**
     * @var SystemStatusDto[]|null
     */
    private array|null $systemStatus;

    /**
     * @var int
     */
    private int $systemStatusTimestamp;

    /**
     * @var float
     */
    private float $temperature;

    /**
     * @var int
     */
    private int $temperatureTimestamp;

    /**
     * @var int
     */
    private int $ttl;

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
    public function set(array $data): void
    {
        foreach ($data as $key => $value) {
            switch ($key) {
                case 'power':
                    if (is_array($value)) {
                        $this->power = [];

                        foreach ($value as $powerEntry) {
                            $dto = new PowerResponseDto();
                            $dto->set($powerEntry);

                            $this->power[] = $dto;
                        }
                    }

                    break;

                case 'systemStatus':
                    if (is_array($value)) {
                        $this->systemStatus = [];

                        foreach ($value as $statusEntry) {
                            $dto = new SystemStatusDto();
                            $dto->set($statusEntry);

                            $this->systemStatus[] = $dto;
                        }
                    }

                    break;

                case 'zigbeeStatus':
                    if (is_array($value)) {
                        $this->zigbeeStatus = new ZigbeeStatusDto();
                        $this->zigbeeStatus->set($value);
                    }

                    break;

                default:
                    $this->{$key} = $value;
            }
        }
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
