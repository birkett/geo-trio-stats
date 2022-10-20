<?php

declare(strict_types=1);

namespace GeoTrio\classes\controller;

use GeoTrio\classes\TmpFileCache;
use GeoTrio\interfaces\OutputCacheInterface;
use GeoTrio\traits\CachedOutputTrait;
use JsonException;
use GeoTrio\classes\geotrio\GeoTrioApi;

final class LiveDataController extends AbstractController
{
    use CachedOutputTrait;

    public function __construct()
    {
        $this->setOutputCache(new TmpFileCache());
        $this->setCacheTime(OutputCacheInterface::CACHE_TIME_30_SECONDS);

        parent::__construct();
    }

    /**
     * {@inheritDoc}
     */
    public function getRoute(): string
    {
        return '/live';
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
        $cachedResponse = $this->cacheGet(self::class);

        if ($cachedResponse) {
            return $cachedResponse;
        }

        $geoApi = new GeoTrioApi(getenv('GEO_API_USERNAME'), getenv('GEO_API_PASSWORD'));

        $liveData = $geoApi->getLiveData();

        if ($liveData->getTtl() > 0) {
            $this->setCacheTime(sprintf('+%d second', $liveData->getTtl()));
        }

        $response = json_encode($liveData, JSON_THROW_ON_ERROR);

        $this->cacheSet(self::class, $response);

        return $response;
    }
}
