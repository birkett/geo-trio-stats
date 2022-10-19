<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto;

use JsonSerializable;

final class PowerResponseDto implements JsonSerializable
{
    /**
     * @var string
     */
    private string $type;

    /**
     * @var int
     */
    private int $watts;

    /**
     * @var bool
     */
    private bool $valueAvailable;

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
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getWatts(): int
    {
        return $this->watts;
    }

    /**
     * @return bool
     */
    public function isValueAvailable(): bool
    {
        return $this->valueAvailable;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
