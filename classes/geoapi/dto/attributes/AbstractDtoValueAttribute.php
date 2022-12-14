<?php

declare(strict_types=1);

namespace GeoTrioStats\classes\geoapi\dto\attributes;

abstract class AbstractDtoValueAttribute
{
    /**
     * @var string
     */
    private readonly string $dtoClassName;

    /**
     * @param string $dtoClassName
     */
    public function __construct(string $dtoClassName)
    {
        $this->dtoClassName = $dtoClassName;
    }

    /**
     * @return string
     */
    public function getDtoClassName(): string
    {
        return $this->dtoClassName;
    }
}
