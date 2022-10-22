<?php

declare(strict_types=1);

namespace GeoTrioStats\classes\controller;

use JsonException;

final class PeriodicDataController extends AbstractGeoApiController
{
    /**
     * {@inheritDoc}
     */
    public function getRoute(): string
    {
        return '/periodic';
    }

    /**
     * {@inheritDoc}
     *
     * @throws JsonException
     */
    public function get(): string
    {
        return $this->sharedGetController(self::createGeoApi()->getPeriodicData());
    }
}
