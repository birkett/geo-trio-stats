<?php

declare(strict_types=1);

namespace GeoTrio\classes;

final class Template
{
    /**
     * @var string
     */
    private string $templateFile;

    /**
     * @var string[]
     */
    private array $templateArgs;

    /**
     * @param string $templateFile
     * @param array $templateArgs
     */
    public function __construct(string $templateFile, array $templateArgs = [])
    {
        $this->templateFile = $templateFile;
        $this->templateArgs = $templateArgs;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        $template = file_get_contents($this->templateFile);

        foreach ($this->templateArgs as $arg => $value) {
            $template = str_replace('{ ' . $arg . ' }', nl2br($value), $template);
        }

        return $template;
    }
}
