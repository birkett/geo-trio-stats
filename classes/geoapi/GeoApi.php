<?php

declare(strict_types=1);

namespace GeoTrioStats\classes\geoapi;

use CurlHandle;
use GeoTrioStats\classes\geoapi\dto\AuthTokenResponseDto;
use GeoTrioStats\classes\geoapi\dto\DeviceDetailsDto;
use GeoTrioStats\classes\geoapi\dto\interfaces\GeoApiResponseInterface;
use GeoTrioStats\classes\geoapi\dto\PeriodicDataResponse;
use GeoTrioStats\classes\Json;
use JsonException;
use GeoTrioStats\classes\geoapi\dto\CredentialsDto;
use GeoTrioStats\classes\geoapi\dto\LiveDataResponse;
use GeoTrioStats\classes\TmpFileCache;
use GeoTrioStats\interfaces\OutputCacheInterface;
use GeoTrioStats\traits\CachedOutputTrait;

class GeoApi
{
    use CachedOutputTrait;

    private const BASE_URL = 'https://api.geotogether.com';
    private const LOGIN_URL = '/usersservice/v2/login';
    private const DEVICE_DETAILS_URL = '/api/userapi/v2/user/detail-systems?systemDetails=true';
    private const LIVEDATA_URL = '/api/userapi/system/smets2-live-data/';
    private const PERIODIC_DATA_URL = '/api/userapi/system/smets2-periodic-data/';

    private const AUTH_TOKEN_CACHE_NAME = 'AuthToken';
    private const DEVICE_ID_CACHE_NAME = 'DeviceId';
    private const LIVE_DATA_CACHE_NAME = 'LiveData';
    private const PERIODIC_DATA_CACHE_NAME = 'PeriodicData';

    /**
     * @var false|CurlHandle
     */
    private false|CurlHandle $curl;

    /**
     * @var string[]
     */
    private array $headers;

    /**
     * @var string
     */
    private string $username;

    /**
     * @var string
     */
    private string $password;

    /**
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username, string $password)
    {
        $this->setOutputCache(new TmpFileCache());
        $this->setCacheTime(OutputCacheInterface::CACHE_TIME_1_HOUR);

        $this->username = $username;
        $this->password = $password;

        $this->headers = [
            'Accept: application/json',
            'Content-Type: application/json',
        ];

        $this->curl = curl_init();

        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->headers);
    }

    /**
     * @return LiveDataResponse[]
     *
     * @throws JsonException
     */
    public function getLiveData(): array
    {
        return $this->getResponseArray(self::LIVEDATA_URL, LiveDataResponse::class);
    }

    /**
     * @return PeriodicDataResponse[]
     *
     * @throws JsonException
     */
    public function getPeriodicData(): array
    {
        return $this->getResponseArray(self::PERIODIC_DATA_URL, PeriodicDataResponse::class);
    }

    /**
     * @param string $url
     * @param string $responseDtoClassName
     *
     * @return GeoApiResponseInterface[]
     *
     * @throws JsonException
     */
    private function getResponseArray(string $url, string $responseDtoClassName): array
    {
        $responses = $this->getData($url);
        $return = [];

        foreach ($responses as $response) {
            $return[] = new $responseDtoClassName($response);
        }

        return $return;
    }

    /**
     * @param string $api
     *
     * @return array
     *
     * @throws JsonException
     */
    private function getData(string $api): array
    {
        $this->setAccessToken();

        $deviceIds = $this->getDeviceIds();
        $responses = [];

        foreach ($deviceIds as $deviceId) {
            $url = self::BASE_URL . $api . $deviceId;

            curl_setopt($this->curl, CURLOPT_URL, $url);
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, null);
            curl_setopt($this->curl, CURLOPT_POST, false);

            $resp = curl_exec($this->curl);
            $code = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);

            if (false === $resp || $code > 200) {
                curl_close($this->curl);

                throw new GeoApiException('Failed to fetch live data, code ' . $code);
            }

            $responses[] = Json::decodeToArray($resp);
        }

        return $responses;
    }

    /**
     * @return string[]
     *
     * @throws JsonException
     */
    private function getDeviceIds(): array
    {
        $cachedDeviceIds = $this->cacheGet(static::class . self::DEVICE_ID_CACHE_NAME);

        if ($cachedDeviceIds) {
            return explode(',', $cachedDeviceIds);
        }

        $url = self::BASE_URL . self::DEVICE_DETAILS_URL;

        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, null);
        curl_setopt($this->curl, CURLOPT_POST, false);

        $resp = curl_exec($this->curl);
        $code = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);

        if (false === $resp || $code  > 200) {
            curl_close($this->curl);

            throw new GeoApiException('Failed to request device ID.');
        }

        $deviceDetails = new DeviceDetailsDto(Json::decodeToArray($resp));

        $deviceIds = [];

        foreach ($deviceDetails->getSystemRoles() as $role) {
            $deviceIds[] = $role->getSystemId();
        }

        if (empty($deviceIds)) {
            curl_close($this->curl);

            throw new GeoApiException('Device ID not found, response was: ' . $resp);
        }

        $this->cacheSet(static::class . self::DEVICE_ID_CACHE_NAME, implode(',', $deviceIds));

        return $deviceIds;
    }

    /**
     * @return void
     *
     * @throws JsonException
     */
    private function setAccessToken(): void
    {
        $cachedToken = $this->cacheGet(static::class . self::AUTH_TOKEN_CACHE_NAME);

        if ($cachedToken) {
            $this->setAccessTokenHeader($cachedToken);

            return;
        }

        $url = self::BASE_URL . self::LOGIN_URL;

        $credentials = Json::encodeToString(new CredentialsDto($this->username, $this->password));

        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $credentials);

        $resp = curl_exec($this->curl);
        $code = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);

        if (false === $resp || $code > 200) {
            curl_close($this->curl);

            throw new GeoApiException('Failed to log in, code ' . $code);
        }

        $authResponse = new AuthTokenResponseDto(Json::decodeToArray($resp));

        if (!$authResponse->hasToken()) {
            curl_close($this->curl);

            throw new GeoApiException('Authentication token not found. Response was: ' . $resp);
        }

        $this->cacheSet(static::class . self::AUTH_TOKEN_CACHE_NAME, $authResponse->getAccessToken());
        $this->setAccessTokenHeader($authResponse->getAccessToken());
    }

    /**
     * @param string $accessToken
     *
     * @return void
     */
    private function setAccessTokenHeader(string $accessToken): void
    {
        $this->headers[] = 'Authorization: Bearer ' . $accessToken;

        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->headers);
    }
}
