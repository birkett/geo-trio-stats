<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto;

use JsonSerializable;

final class ZigbeeStatusDto implements JsonSerializable
{
    /**
     * @var string
     */
    private string $electricityClusterStatus;

    /**
     * @var string
     */
    private string $gasClusterStatus;

    /**
     * @var string
     */
    private string $hanStatus;

    /**
     * @var int
     */
    private int $networkRssi;

    /**
     * @param array $data
     *
     * @return void
     */
    public function set(array $data): void
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }

    /**
     * @return string
     */
    public function getElectricityClusterStatus(): string
    {
        return $this->electricityClusterStatus;
    }

    /**
     * @return string
     */
    public function getGasClusterStatus(): string
    {
        return $this->gasClusterStatus;
    }

    /**
     * @return string
     */
    public function getHanStatus(): string
    {
        return $this->hanStatus;
    }

    /**
     * @return int
     */
    public function getNetworkRssi(): int
    {
        return $this->networkRssi;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
