<?php

declare(strict_types=1);

namespace GeoTrio\classes\controller;

use GeoTrio\classes\geotrio\dto\interfaces\GeoTrioApiResponseInterface;
use GeoTrio\classes\geotrio\GeoTrioApi;
use JsonException;
use GeoTrio\classes\TmpFileCache;
use GeoTrio\interfaces\OutputCacheInterface;
use GeoTrio\traits\CachedOutputTrait;

abstract class AbstractGeoApiController extends AbstractController
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
    public function getContentType(): string
    {
        return self::CONTENT_TYPE_JSON;
    }

    /**
     * @param GeoTrioApiResponseInterface $apiResponse
     *
     * @return string
     *
     * @throws JsonException
     */
    protected function sharedGetController(GeoTrioApiResponseInterface $apiResponse): string
    {
        $cachedResponse = $this->cacheGet(static::class);

        if ($cachedResponse) {
            return $cachedResponse;
        }

        if ($apiResponse->hasValidTtl()) {
            $this->setCacheTime($apiResponse->getTtlAsTimeString());
        }

        $response = json_encode($apiResponse, JSON_THROW_ON_ERROR);

        $this->cacheSet(static::class, $response);

        return $response;
    }

    /**
     * @return GeoTrioApi
     */
    protected static function createGeoApi(): GeoTrioApi
    {
        return new GeoTrioApi(getenv('GEO_API_USERNAME'), getenv('GEO_API_PASSWORD'));
    }
}
