<?php

declare(strict_types=1);

namespace GeoTrio\interfaces;

interface ControllerInterface
{
    public const CONTENT_TYPE_HTML = 'text/html';
    public const CONTENT_TYPE_JSON = 'application/json';

    public const RESPONSE_CODE_OK = 200;
    public const RESPONSE_CODE_NOT_FOUND = 404;

    /**
     * Get the response content type.
     *
     * @return string
     */
    public function getContentType(): string;

    /**
     * Set the response content type.
     *
     * @param string $contentType
     *
     * @return void
     */
    public function setContentType(string $contentType): void;

    /**
     * Get the response code from this controller.
     *
     * @return int
     */
    public function getResponseCode(): int;

    /**
     * Set the response code for this controller.
     *
     * @param int $responseCode
     *
     * @return void
     */
    public function setResponseCode(int $responseCode): void;

    /**
     * Get the route this controller listens on.
     *
     * @return string
     */
    public function getRoute(): string;

    /**
     * GET controller action.
     *
     * @return string
     */
    public function get(): string;
}
