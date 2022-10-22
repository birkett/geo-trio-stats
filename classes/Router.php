<?php

declare(strict_types=1);

namespace GeoTrioStats\classes;

use GeoTrioStats\classes\controller\NotFoundController;
use GeoTrioStats\interfaces\ControllerInterface;

final class Router
{
    /**
     * @var ControllerInterface[]
     */
    private array $controllers;

    /**
     * @param string[] $controllers
     */
    public function __construct(array $controllers)
    {
        foreach ($controllers as $controller) {
            $this->controllers[] = new $controller();
        }
    }

    /**
     * @param string $method
     * @param string $path
     *
     * @return string
     */
    public function handleRequest(string $method, string $path): string
    {
        $matchedController = null;
        $methodName = strtolower($method);

        foreach ($this->controllers as $controller) {
            if (
                $controller->getRoute() === $path
                && method_exists($controller, $methodName)
            ) {
                $matchedController = $controller;

                break;
            }
        }

        if (!$matchedController instanceof ControllerInterface) {
            $matchedController = new NotFoundController();
            $content = $matchedController->get();
        } else {
            $content = $matchedController->{$methodName}();
        }

        $this->setResponseCode($matchedController->getResponseCode());
        $this->setContentType($matchedController->getContentType());

        return $content;
    }

    /**
     * @param int $responseCode
     *
     * @return void
     */
    private function setResponseCode(int $responseCode): void
    {
        http_response_code($responseCode);
    }

    /**
     * @param string $contentType
     *
     * @return void
     */
    private function setContentType(string $contentType): void
    {
        header('Content-Type: ' . $contentType);
    }
}
