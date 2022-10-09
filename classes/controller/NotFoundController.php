<?php

declare(strict_types=1);

namespace GeoTrio\classes\controller;

final class NotFoundController extends AbstractController
{
    /**
     * {@inheritDoc}
     */
    public function getRoute(): string
    {
        return '/404';
    }

    /**
     * {@inheritDoc}
     */
    public function getResponseCode(): int
    {
        return self::RESPONSE_CODE_NOT_FOUND;
    }

    /**
     * {@inheritDoc}
     */
    public function get(): string
    {
        return '404 Not Found';
    }
}
