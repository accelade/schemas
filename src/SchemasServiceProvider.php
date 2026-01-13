<?php

declare(strict_types=1);

namespace Accelade\Schemas;

use Accelade\Docs\DocsRegistry;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class SchemasServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/schemas.php',
            'schemas'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Load translations
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'schemas');

        // Load views under 'accelade' namespace to extend the main Accelade package
        // This allows components to be used as <x-accelade::section />
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'accelade');

        // Also load under 'schemas' namespace for scripts/styles views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'schemas');

        // Load routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        // Register Blade directives
        $this->registerBladeDirectives();

        // Inject scripts/styles into Accelade (if available)
        $this->injectAcceladeAssets();

        // Register documentation sections
        $this->registerDocumentation();

        if ($this->app->runningInConsole()) {
            // Publish config
            $this->publishes([
                __DIR__.'/../config/schemas.php' => config_path('schemas.php'),
            ], 'schemas-config');

            // Publish views
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/accelade'),
            ], 'schemas-views');

            // Publish assets
            $this->publishes([
                __DIR__.'/../dist' => public_path('vendor/schemas'),
            ], 'schemas-assets');

            // Publish translations
            $this->publishes([
                __DIR__.'/../lang' => lang_path('vendor/schemas'),
            ], 'schemas-lang');

            // Register commands
            $this->commands([
                Console\InstallCommand::class,
            ]);
        }
    }

    /**
     * Register Blade directives for schemas.
     */
    protected function registerBladeDirectives(): void
    {
        // @schemasScripts - Include the schemas JavaScript (fallback if not using @acceladeScripts)
        Blade::directive('schemasScripts', function () {
            return "<?php echo view('schemas::scripts')->render(); ?>";
        });

        // @schemasStyles - Include the schemas CSS (fallback if not using @acceladeStyles)
        Blade::directive('schemasStyles', function () {
            return "<?php echo view('schemas::styles')->render(); ?>";
        });
    }

    /**
     * Inject Schemas scripts and styles into Accelade.
     * This allows Schemas assets to be included automatically with @acceladeScripts/@acceladeStyles.
     */
    protected function injectAcceladeAssets(): void
    {
        // Only inject if Accelade is available
        if (! $this->app->bound('accelade')) {
            return;
        }

        /** @var \Accelade\Accelade $accelade */
        $accelade = $this->app->make('accelade');

        // Inject Schemas JavaScript
        $accelade->registerScript('schemas', function () {
            return view('schemas::scripts')->render();
        });

        // Inject Schemas CSS
        $accelade->registerStyle('schemas', function () {
            return view('schemas::styles')->render();
        });
    }

    /**
     * Register documentation sections with Accelade's DocsRegistry.
     */
    protected function registerDocumentation(): void
    {
        // Only register if Accelade's DocsRegistry is available
        if (! $this->app->bound('accelade.docs')) {
            return;
        }

        /** @var DocsRegistry $registry */
        $registry = $this->app->make('accelade.docs');

        // Register the schemas package docs path
        $registry->registerPackage('schemas', __DIR__.'/../docs');

        // Register navigation group for Schemas
        $registry->registerGroup('schemas', 'Schemas', '📐', 40);

        // Register documentation sections
        $registry->section('schemas-overview')
            ->label('Overview')
            ->icon('📋')
            ->markdown('overview.md')
            ->description('Schema layout components for organizing content')
            ->keywords(['schema', 'layout', 'organize', 'structure'])
            ->demo()
            ->view('schemas::docs.sections.overview')
            ->package('schemas')
            ->inGroup('schemas')
            ->register();

        $registry->section('schemas-section')
            ->label('Section')
            ->icon('📦')
            ->markdown('section.md')
            ->description('Collapsible sections with headings')
            ->keywords(['section', 'collapsible', 'heading', 'container'])
            ->demo()
            ->view('schemas::docs.sections.section')
            ->package('schemas')
            ->inGroup('schemas')
            ->register();

        $registry->section('schemas-tabs')
            ->label('Tabs')
            ->icon('📑')
            ->markdown('tabs.md')
            ->description('Tabbed content panels')
            ->keywords(['tabs', 'tab', 'panel', 'navigation'])
            ->demo()
            ->view('schemas::docs.sections.tabs')
            ->package('schemas')
            ->inGroup('schemas')
            ->register();

        $registry->section('schemas-grid')
            ->label('Grid')
            ->icon('⊞')
            ->markdown('grid.md')
            ->description('Responsive grid layouts')
            ->keywords(['grid', 'columns', 'layout', 'responsive'])
            ->demo()
            ->view('schemas::docs.sections.grid')
            ->package('schemas')
            ->inGroup('schemas')
            ->register();

        $registry->section('schemas-wizard')
            ->label('Wizard')
            ->icon('🧙')
            ->markdown('wizard.md')
            ->description('Multi-step wizard forms')
            ->keywords(['wizard', 'steps', 'multi-step', 'form'])
            ->demo()
            ->view('schemas::docs.sections.wizard')
            ->package('schemas')
            ->inGroup('schemas')
            ->register();

        $registry->section('schemas-fieldset')
            ->label('Fieldset')
            ->icon('📝')
            ->markdown('fieldset.md')
            ->description('Group related fields with a legend')
            ->keywords(['fieldset', 'legend', 'group', 'form'])
            ->demo()
            ->view('schemas::docs.sections.fieldset')
            ->package('schemas')
            ->inGroup('schemas')
            ->register();

        $registry->section('schemas-split')
            ->label('Split')
            ->icon('↔️')
            ->markdown('split.md')
            ->description('Two-column layouts with configurable ratios')
            ->keywords(['split', 'two-column', 'sidebar', 'layout'])
            ->demo()
            ->view('schemas::docs.sections.split')
            ->package('schemas')
            ->inGroup('schemas')
            ->register();

        $registry->section('schemas-columns')
            ->label('Columns')
            ->icon('▤')
            ->markdown('columns.md')
            ->description('Simple equal-width column layouts')
            ->keywords(['columns', 'equal', 'layout', 'grid'])
            ->demo()
            ->view('schemas::docs.sections.columns')
            ->package('schemas')
            ->inGroup('schemas')
            ->register();

        $registry->section('schemas-flex')
            ->label('Flex')
            ->icon('↔️')
            ->markdown('flex.md')
            ->description('Flexible width layouts using flexbox')
            ->keywords(['flex', 'flexbox', 'layout', 'responsive', 'grow'])
            ->demo()
            ->view('schemas::docs.sections.flex')
            ->package('schemas')
            ->inGroup('schemas')
            ->register();

        $registry->section('schemas-empty-state')
            ->label('Empty State')
            ->icon('📭')
            ->markdown('empty-state.md')
            ->description('Display meaningful empty states')
            ->keywords(['empty', 'state', 'placeholder', 'no-content'])
            ->demo()
            ->view('schemas::docs.sections.empty-state')
            ->package('schemas')
            ->inGroup('schemas')
            ->register();

        $registry->section('schemas-text')
            ->label('Text')
            ->icon('📝')
            ->markdown('text.md')
            ->description('Display styled text content and badges')
            ->keywords(['text', 'badge', 'content', 'typography'])
            ->demo()
            ->view('schemas::docs.sections.text')
            ->package('schemas')
            ->inGroup('schemas')
            ->register();

        $registry->section('schemas-icon')
            ->label('Icon')
            ->icon('🎯')
            ->markdown('icon.md')
            ->description('Display SVG icons with colors and sizes')
            ->keywords(['icon', 'svg', 'symbol', 'graphic'])
            ->demo()
            ->view('schemas::docs.sections.icon')
            ->package('schemas')
            ->inGroup('schemas')
            ->register();

        $registry->section('schemas-image')
            ->label('Image')
            ->icon('🖼️')
            ->markdown('image.md')
            ->description('Display images with alignment and styling')
            ->keywords(['image', 'photo', 'picture', 'avatar'])
            ->demo()
            ->view('schemas::docs.sections.image')
            ->package('schemas')
            ->inGroup('schemas')
            ->register();

        $registry->section('schemas-unordered-list')
            ->label('List')
            ->icon('📋')
            ->markdown('unordered-list.md')
            ->description('Display bullet point lists')
            ->keywords(['list', 'bullet', 'unordered', 'items'])
            ->demo()
            ->view('schemas::docs.sections.unordered-list')
            ->package('schemas')
            ->inGroup('schemas')
            ->register();
    }
}
