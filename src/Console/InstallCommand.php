<?php

declare(strict_types=1);

namespace Accelade\Schemas\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'schemas:install {--force : Overwrite existing files}';

    protected $description = 'Install the Accelade Schemas package';

    public function handle(): int
    {
        $this->info('Installing Accelade Schemas...');

        // Publish config
        $this->call('vendor:publish', [
            '--tag' => 'schemas-config',
            '--force' => $this->option('force'),
        ]);

        // Publish assets
        $this->call('vendor:publish', [
            '--tag' => 'schemas-assets',
            '--force' => $this->option('force'),
        ]);

        $this->info('Accelade Schemas installed successfully!');

        return self::SUCCESS;
    }
}
