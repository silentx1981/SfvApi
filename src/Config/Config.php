<?php

namespace SfvApi\Config;

class Config
{
    private static $config = null;

    public static function get(string $section, ?string $key = null) : string|array|null
    {
        return self::$config[$section][$key] ?? null;
    }

    public static function init($basePath) : void
    {
        self::$config = json_decode(file_get_contents($basePath . '/config/config.json'), true);
    }

    public static function set(string $section, string $key, string $value) : void
    {
        self::$config[$section][$key] = $value;
    }
}