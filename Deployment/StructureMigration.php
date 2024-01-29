<?php

declare(strict_types=1);

namespace Phphleb\Adminpan\Deployment;

class StructureMigration
{
    /**
     * Adding a library configuration to a custom admin panel.
     *
     * Добавление конфигурации библиотеки к настраиваемой административной панели.
     */
    public function add(string $originPath, string $targetPath, bool $quiet, bool $replace = false): int
    {
        $path = \hl_relative_path($targetPath);
        if (\file_exists($targetPath)) {
            if (!$replace) {
                if (!$quiet) {
                    echo PHP_EOL . "Configuration file {$path} has already been installed." . PHP_EOL;
                }
                return 0;
            } else {
                unlink($targetPath);
            }
        } else {
            \hl_create_directory($targetPath);
        }
        $content = \file_get_contents($originPath);
        \file_put_contents($targetPath, $content);

        if (!$quiet) {
            echo "[+] Copied configuration file to {$path}" . PHP_EOL;
        }

        return 0;
    }
}