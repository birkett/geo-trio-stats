<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto;

use JsonSerializable;

final class SystemStatusDto implements JsonSerializable
{
    /**
     * @var string
     */
    private string $component;

    /**
     * @var string
     */
    private string $statusType;

    /**
     * @var string
     */
    private string $systemErrorCode;

    /**
     * @var int
     */
    private int $systemErrorNumber;

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
    public function getComponent(): string
    {
        return $this->component;
    }

    /**
     * @return string
     */
    public function getStatusType(): string
    {
        return $this->statusType;
    }

    /**
     * @return string
     */
    public function getSystemErrorCode(): string
    {
        return $this->systemErrorCode;
    }

    /**
     * @return int
     */
    public function getSystemErrorNumber(): int
    {
        return $this->systemErrorNumber;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
