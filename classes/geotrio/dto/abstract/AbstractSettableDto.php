<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\abstract;

use JsonSerializable;

abstract class AbstractSettableDto implements JsonSerializable
{
    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->set($data);
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }

    /**
     * @param array $data
     *
     * @return void
     */
    protected function set(array $data): void
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }

    /**
     * @param string $classProperty
     * @param string $dtoClass
     * @param mixed $value
     *
     * @return void
     */
    protected function setDtoArray(string $classProperty, string $dtoClass, mixed $value): void
    {
        if (!is_array($value)) {
            return;
        }

        $this->{$classProperty} = [];

        foreach ($value as $v) {
            $this->{$classProperty}[] = new $dtoClass($v);
        }
    }
}
