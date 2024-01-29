<?php

declare(strict_types=1);

namespace Phphleb\Adminpan\Deployment;

use Hleb\Main\Console\Commands\Deployer\DeploymentLibInterface;
use Hleb\Static\Settings;

class StartForHleb implements DeploymentLibInterface
{
    private bool $quiet = false;

    /**
     * @param array $config - configuration for deploying libraries,
     *                        sample in updater.json file.
     *                      - конфигурация для развертывания библиотек,
     *                        образец в файле updater.json.
     */
    public function __construct(private readonly array $config)
    {
    }

    /**
     * @inheritDoc
     */
    #[\Override]
    public function noInteraction(): void
    {
        // Interactivity is not used.
        // Интерактивность не используется.
    }

    /**
     * @inheritDoc
     */
    #[\Override]
    public function help(): string|false
    {
        return 'Performs deployment/rollback for the `adminpan` component.';
    }

    /**
     * @inheritDoc
     */
    #[\Override]
    public function add(): int
    {
        $originPath = Settings::getPath('@library/adminpan/match-directory/structure/adminpan.php');
        $targetPath = Settings::getPath('@/config/structure/adminpan.php');

        return (new StructureMigration())->add($originPath, $targetPath, $this->quiet);
    }

    /**
     * @inheritDoc
     */
    #[\Override]
    public function remove(): int
    {
        if (!$this->quiet) {
            echo "Deleting the data of the `adminpan` component is not provided." . PHP_EOL;
        }
        return 0;
    }

    /**
     * @inheritDoc
     */
    #[\Override]
    public function classmap(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    #[\Override]
    public function quiet(): void
    {
        $this->quiet = true;
    }
}