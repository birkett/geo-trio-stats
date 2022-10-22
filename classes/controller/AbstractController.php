<?php

declare(strict_types=1);

namespace GeoTrioStats\classes\controller;

use GeoTrioStats\interfaces\ControllerInterface;

abstract class AbstractController implements ControllerInterface
{
    /**
     * @var string
     */
    private string $contentType;

    /**
     * @var int
     */
    private int $responseCode;

    public function __construct()
    {
        $this->contentType = self::CONTENT_TYPE_HTML;
        $this->responseCode = self::RESPONSE_CODE_OK;
    }

    /**
     * @return string
     */
    public function getContentType(): string
    {
        return $this->contentType;
    }

    /**
     * @param string $contentType
     *
     * @return void
     */
    public function setContentType(string $contentType): void
    {
        $this->contentType = $contentType;
    }

    /**
     * {@inheritDoc}
     */
    public function getResponseCode(): int
    {
        return $this->responseCode;
    }

    /**
     * @param int $responseCode
     *
     * @return void
     */
    public function setResponseCode(int $responseCode): void
    {
        $this->responseCode = $responseCode;
    }

    /**
     * {@inheritDoc}
     */
    abstract public function getRoute(): string;

    /**
     * {@inheritDoc}
     */
    abstract public function get(): string;
}
