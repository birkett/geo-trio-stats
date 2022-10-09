<?php

declare(strict_types=1);

namespace GeoTrio\classes\controller;

use JsonException;
use GeoTrio\classes\geotrio\GeoTrioApi;

final class IndexController extends AbstractController
{
    /**
     * {@inheritDoc}
     */
    public function getRoute(): string
    {
        return '/';
    }

    /**
     * {@inheritDoc}
     */
    public function getContentType(): string
    {
        return self::CONTENT_TYPE_JSON;
    }

    /**
     * {@inheritDoc}
     *
     * @throws JsonException
     */
    public function get(): string
    {
        $geoApi = new GeoTrioApi('test', 'test');

        return json_encode($geoApi->getLiveData(), JSON_THROW_ON_ERROR);
    }
}
