<?php

declare(strict_types=1);

namespace GeoTrioStats\classes\geoapi;

use GeoTrioStats\classes\geoapi\dto\AuthTokenResponseDto;
use GeoTrioStats\classes\geoapi\dto\components\SystemRoleDto;
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
     * @var CredentialsDto
     */
    private readonly CredentialsDto $credentials;

    /**
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username, string $password)
    {
        $this->setOutputCache(new TmpFileCache());
        $this->setCacheTime(OutputCacheInterface::CACHE_TIME_1_HOUR);

        $this->credentials = new CredentialsDto($username, $password);
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
        $deviceIds = $this->getDeviceIds();
        $responses = [];

        foreach ($deviceIds as $deviceId) {
            $response = $this->getApiResponse(self::BASE_URL . $api . $deviceId);

            $responses[] = Json::decodeToArray($response);
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

        $response = $this->getApiResponse(self::BASE_URL . self::DEVICE_DETAILS_URL);
        $deviceDetails = new DeviceDetailsDto(Json::decodeToArray($response));

        $deviceIds = array_map(static function (SystemRoleDto $role) {
            return $role->getSystemId();
        }, $deviceDetails->getSystemRoles());

        if (empty($deviceIds)) {
            throw new GeoApiException('Device ID not found, response was: ' . $response);
        }

        $this->cacheSet(static::class . self::DEVICE_ID_CACHE_NAME, implode(',', $deviceIds));

        return $deviceIds;
    }

    /**
     * @return string
     *
     * @throws JsonException
     */
    private function getAccessToken(): string
    {
        $cachedToken = $this->cacheGet(static::class . self::AUTH_TOKEN_CACHE_NAME);

        if ($cachedToken) {
            return $cachedToken;
        }

        $credentials = Json::encodeToString($this->credentials);
        $response = $this->getApiResponse(self::BASE_URL . self::LOGIN_URL, $credentials, false);
        $authResponse = new AuthTokenResponseDto(Json::decodeToArray($response));

        if (!$authResponse->hasToken()) {
            throw new GeoApiException('Authentication token not found. Response was: ' . $response);
        }

        $this->cacheSet(static::class . self::AUTH_TOKEN_CACHE_NAME, $authResponse->getAccessToken());

        return $authResponse->getAccessToken();
    }

    /**
     * @param string $url
     * @param string|null $postData
     * @param bool $needAccessToken
     *
     * @return string
     *
     * @throws JsonException
     */
    private function getApiResponse(string $url, string $postData = null, bool $needAccessToken = true): string
    {
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
        ];

        if ($needAccessToken) {
            $headers[] = 'Authorization: Bearer ' . $this->getAccessToken();
        }

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postData ?: null);
        curl_setopt($curl, CURLOPT_POST, (bool) $postData);

        $response = curl_exec($curl);
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        if (!$response || $code !== 200) {
            throw new GeoApiException('Failed to fetch live data, code ' . $code);
        }

        return $response;
    }
}
