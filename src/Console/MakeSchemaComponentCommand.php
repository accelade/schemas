<?php

declare(strict_types=1);

namespace Accelade\Schemas\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakeSchemaComponentCommand extends Command
{
    protected $signature = 'accelade:schema-component
                            {name : The name of the component (e.g., Chart, Alert)}
                            {--force : Overwrite existing files}';

    protected $description = 'Create a new custom schema component class and view';

    public function __construct(protected Filesystem $files)
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $name = $this->argument('name');
        $studlyName = Str::studly($name);
        $kebabName = Str::kebab($name);

        $this->createComponentClass($studlyName);
        $this->createBladeView($kebabName);

        $this->components->info("Schema component [{$studlyName}] created successfully.");

        $this->newLine();
        $this->line("  <fg=gray>Component class:</> app/Schemas/Components/{$studlyName}.php");
        $this->line("  <fg=gray>Blade view:</> resources/views/schemas/components/{$kebabName}.blade.php");

        $this->newLine();
        $this->line('  <fg=yellow>Usage:</>');
        $this->line("  {$studlyName}::make()");
        $this->line("      ->heading('My Heading')");
        $this->line('      ->description(\'A description\');');

        return self::SUCCESS;
    }

    protected function createComponentClass(string $name): void
    {
        $path = app_path("Schemas/Components/{$name}.php");

        if (! $this->option('force') && $this->files->exists($path)) {
            $this->components->error("Component [{$name}] already exists.");

            return;
        }

        $this->makeDirectory($path);

        $stub = $this->getComponentStub();
        $stub = str_replace(
            ['{{ class }}', '{{ view }}'],
            [$name, Str::kebab($name)],
            $stub
        );

        $this->files->put($path, $stub);
    }

    protected function createBladeView(string $name): void
    {
        $path = resource_path("views/schemas/components/{$name}.blade.php");

        if (! $this->option('force') && $this->files->exists($path)) {
            $this->components->warn("View [{$name}] already exists, skipping.");

            return;
        }

        $this->makeDirectory($path);

        $stub = $this->getViewStub();
        $stub = str_replace('{{ name }}', $name, $stub);

        $this->files->put($path, $stub);
    }

    protected function makeDirectory(string $path): void
    {
        if (! $this->files->isDirectory(dirname($path))) {
            $this->files->makeDirectory(dirname($path), 0o755, true);
        }
    }

    protected function getComponentStub(): string
    {
        $customPath = base_path('stubs/schema-component.stub');

        if ($this->files->exists($customPath)) {
            return $this->files->get($customPath);
        }

        return $this->files->get(__DIR__.'/../../stubs/schema-component.stub');
    }

    protected function getViewStub(): string
    {
        $customPath = base_path('stubs/schema-component-view.stub');

        if ($this->files->exists($customPath)) {
            return $this->files->get($customPath);
        }

        return $this->files->get(__DIR__.'/../../stubs/schema-component-view.stub');
    }
}
