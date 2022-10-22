<?php

declare(strict_types=1);

namespace GeoTrioStats\classes\geoapi\dto\abstract;

use GeoTrioStats\classes\geoapi\dto\attributes\DtoArrayValue;
use GeoTrioStats\classes\geoapi\dto\attributes\DtoValue;
use JsonSerializable;
use ReflectionClass;

abstract class AbstractSettableDto implements JsonSerializable
{
    /**
     * Initialises this class properties in three different ways:
     * 1) Properties tagged with DtoArrayValue are initialised as an array of DTOs.
     * 2) Properties tagged with DtoValue are initialised as a single DTO.
     * 3) All other properties have their basic value set.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $attributes = $this->getAttributes();
        $this->setProperties($attributes, $data);
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
     * @return array
     */
    private function getAttributes(): array
    {
        $dtoValueProperties = [];
        $dtoArrayValueProperties = [];

        $reflectionClass = new ReflectionClass($this);
        $reflectionProperties = $reflectionClass->getProperties();

        foreach ($reflectionProperties as $property) {
            $dtoValueAttributes = $property->getAttributes(DtoValue::class);
            $dtoArrayValueAttributes = $property->getAttributes(DtoArrayValue::class);

            foreach ($dtoValueAttributes as $attribute) {
                /** @var DtoValue $instance */
                $instance = $attribute->newInstance();
                $dtoValueProperties[$property->getName()] = $instance->getDtoClassName();
            }

            foreach ($dtoArrayValueAttributes as $attribute) {
                /** @var DtoArrayValue $instance */
                $instance = $attribute->newInstance();
                $dtoArrayValueProperties[$property->getName()] = $instance->getDtoClassName();
            }
        }

        return [
            $dtoValueProperties,
            $dtoArrayValueProperties,
        ];
    }

    /**
     * @param array $attributes
     * @param array $data
     *
     * @return void
     */
    private function setProperties(array $attributes, array $data): void
    {
        [$dtoValueProperties, $dtoArrayValueProperties] = $attributes;

        foreach ($data as $key => $value) {
            // Handle array property DTOs.
            if (isset($dtoArrayValueProperties[$key]) && is_array($value)) {
                $this->{$key} = [];

                foreach ($value as $v) {
                    $this->{$key}[] = new ($dtoArrayValueProperties[$key])($v);
                }

                continue;
            }

            // Handle single value property DTOs.
            if (isset($dtoValueProperties[$key]) && is_array($value)) {
                $this->{$key} = new ($dtoValueProperties[$key])($value);

                continue;
            }

            // Value is not an array, property is not a DTO, and the value is not null.
            if (!empty($value)) {
                $this->{$key} = $value;
            }
        }
    }
}
