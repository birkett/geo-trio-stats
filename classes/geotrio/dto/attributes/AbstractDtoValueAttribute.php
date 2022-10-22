<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\attributes;

abstract class AbstractDtoValueAttribute
{
    /**
     * @var string
     */
    private string $dtoClassName;

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
