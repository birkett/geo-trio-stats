<?php

declare(strict_types=1);

namespace GeoTrio\classes;

use JsonException;

final class Json
{
    /**
     * @param string $data
     *
     * @return array
     *
     * @throws JsonException
     */
    public static function decodeToArray(string $data): array
    {
        return json_decode($data, true, 10, JSON_THROW_ON_ERROR);
    }

    /**
     * @param object|object[] $data
     *
     * @return string
     *
     * @throws JsonException
     */
    public static function encodeToString(mixed $data): string
    {
        return json_encode($data, JSON_THROW_ON_ERROR);
    }
}
