<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\abstract;

use JsonSerializable;

abstract class AbstractSettableDto implements JsonSerializable
{
    /**
     * This is used to map array properties to the matching DTO class.
     */
    protected const PROPERTY_DTO_ARRAY_MAP = [];

    /**
     * Similar to PROPERTY_DTO_ARRAY_MAP, but maps single entry properties to the matching DTO class.
     */
    protected const PROPERTY_DTO_MAP = [];

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->set($data);
    }

    /**
     * This is used to expose private/protected properties when serialising.
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }

    /**
     * Initialises this class properties in three different ways:
     * 1) Properties in PROPERTY_DTO_ARRAY_MAP are initialised as an array of DTOs.
     * 2) Properties in PROPERTY_DTO_MAP are initialised as a single DTO.
     * 3) All other properties have their basic value set.
     *
     * @param array $data
     *
     * @return void
     */
    private function set(array $data): void
    {
        foreach ($data as $key => $value) {
            // Handle array property DTOs.
            if (isset(static::PROPERTY_DTO_ARRAY_MAP[$key]) && is_array($value)) {
                $this->{$key} = [];

                foreach ($value as $v) {
                    $this->{$key}[] = new (static::PROPERTY_DTO_ARRAY_MAP[$key])($v);
                }

                continue;
            }

            // Handle single value property DTOs.
            if (isset(static::PROPERTY_DTO_MAP[$key]) && is_array($value)) {
                $this->{$key} = new (static::PROPERTY_DTO_MAP[$key])($value);

                continue;
            }

            // Value is not an array, and property is not a DTO.
            $this->{$key} = $value;
        }
    }
}
