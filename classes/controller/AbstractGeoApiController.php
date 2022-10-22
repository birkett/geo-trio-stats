<?php

declare(strict_types=1);

namespace GeoTrio\classes\controller;

use GeoTrio\classes\geoapi\dto\interfaces\GeoApiResponseInterface;
use GeoTrio\classes\geoapi\GeoApi;
use GeoTrio\classes\Json;
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
     * @param GeoApiResponseInterface[] $apiResponses
     *
     * @return string
     *
     * @throws JsonException
     */
    protected function sharedGetController(array $apiResponses): string
    {
        $cachedResponse = $this->cacheGet(static::class);

        if ($cachedResponse) {
            return $cachedResponse;
        }

        // Take the longest TTL from all responses.
        foreach ($apiResponses as $apiResponse) {
            if ($apiResponse->hasValidTtl() && $apiResponse->getTtl() > $this->getCacheTime()) {
                $this->setCacheTime($apiResponse->getTtl());
            }
        }

        $response = Json::encodeToString($apiResponses);

        $this->cacheSet(static::class, $response);

        return $response;
    }

    /**
     * @return GeoApi
     */
    protected static function createGeoApi(): GeoApi
    {
        return new GeoApi(getenv('GEO_API_USERNAME'), getenv('GEO_API_PASSWORD'));
    }
}
