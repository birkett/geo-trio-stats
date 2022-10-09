<?php

declare(strict_types=1);

namespace GeoTrio\classes\controller;

use GeoTrio\classes\Template;

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
    public function get(): string
    {
        return (new Template(__DIR__ . '/../../templates/index.html.tpl'))->render();
    }
}
