<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio;

use CurlHandle;
use stdClass;

class GeoTrioApi
{
    private const BASE_URL = 'https://api.geotogether.com';
    private const LOGIN_URL = '/usersservice/v2/login';
    private const DEVICE_DETAILS_URL = '/api/userapi/v2/user/detail-systems?systemDetails=true';
    private const LIVEDATA_URL = '/api/userapi/system/smets2-live-data/';
    private const PERIODIC_DATA_URL = '/api/userapi/system/smets2-periodic-data/';

    /**
     * @var false|CurlHandle
     */
    private false|CurlHandle $curl;

    /**
     * @var string[]
     */
    private array $headers;

    /**
     * @var string|null
     */
    private ?string $deviceId;

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
        $this->username = $username;
        $this->password = $password;
        $this->deviceId = null;

        $this->headers = [
            'Accept: application/json',
            'Content-Type: application/json',
        ];

        $this->curl = curl_init();

        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->headers);
    }

    /**
     * @return object
     */
    public function getLiveData(): object
    {
        return $this->getData(self::LIVEDATA_URL);
    }

    /**
     * @return object
     */
    public function getPeriodicData(): object
    {
        return $this->getData(self::PERIODIC_DATA_URL);
    }

    /**
     * @param string $api
     *
     * @return object
     */
    private function getData(string $api): object
    {
        if(!$this->deviceId) {
            $this->deviceId = $this->getDeviceId();
        }

        $url = self::BASE_URL . $api . $this->deviceId;

        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, null);
        curl_setopt($this->curl, CURLOPT_POST, false);

        $resp = curl_exec($this->curl);
        $code = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);

        if (false === $resp || $code > 200) {
            $this->deviceId = null;

            curl_close($this->curl);

            throw new GeoApiException('Failed to fetch live data, code ' . $code);
        }

        return JSON_decode($resp, false);
    }

    /**
     * @return string
     */
    private function getDeviceId(): string
    {
        $this->headers[] = 'Authorization: Bearer ' . $this->getAccessToken();

        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->headers);

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

        $data = JSON_decode($resp, false);

        if(!isset($data->systemRoles[0]->systemId)) {
            curl_close($this->curl);

            throw new GeoApiException('Device ID not found, response was: ' . $resp);
        }

        return $data->systemRoles[0]->systemId;
    }

    /**
     * @return string
     */
    private function getAccessToken(): string
    {
        $url = self::BASE_URL . self::LOGIN_URL;

        $data = new stdClass();
        $data->identity = $this->username;
        $data->password = $this->password;

        $msg = JSON_encode($data);

        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $msg);

        $resp = curl_exec($this->curl);
        $code = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);

        if (false === $resp || $code > 200) {
            curl_close($this->curl);

            throw new GeoApiException('Failed to log in, code ' . $code);
        }

        $data = JSON_decode($resp, false);

        if(!isset($data->accessToken)) {
            curl_close($this->curl);

            throw new GeoApiException('Authentication token not found. Response was: ' . $resp);
        }

        return $data->accessToken;
    }
}
