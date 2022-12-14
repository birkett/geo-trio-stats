<?php

declare(strict_types=1);

namespace GeoTrioStats\classes\geoapi;

use RuntimeException;

final class GeoApiException extends RuntimeException
{
    /**
     * @param string $message
     */
    public function __construct(string $message)
    {
        parent::__construct('GeoAPI: ' . $message);
    }
}
