<?php

declare(strict_types=1);

namespace Phphleb\Adminpan\Src;

use ErrorException;
use Hleb\Static\Settings;

final class ConfigDirector
{
    public const API_VERSION = '2';

    private static array $config = [];

    public function __construct(private readonly string $panelName)
    {
    }

    /**
     * @throws ErrorException
     */
    public function getConfig(): false|array
    {
        if (self::$config) {
            return self::$config;
        }
        $target = "@/config/structure/{$this->panelName}.php";
        $path = Settings::getRealPath($target);
        if (!$path) {
            throw new ErrorException("Configuration file not found: $target");
        }
        $config = require $path;
        if (!\is_array($config)) {
            throw new ErrorException("Wrong configuration file format: $target");
        }

        return self::$config = $config;
    }

    /**
     * @throws ErrorException
     */
    public function getMenu(): array
    {
        $config = $this->getConfig();

        return $config['section'] ?? [];
    }
}