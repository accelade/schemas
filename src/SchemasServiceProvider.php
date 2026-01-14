<?php

declare(strict_types=1);

namespace Accelade\Schemas;

use Accelade\Docs\DocsRegistry;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class SchemasServiceProvider extends ServiceProvider
{
    /**
     * Documentation sections configuration.
     *
     * @var array<int, array<string, mixed>>
     */
    private const DOCUMENTATION_SECTIONS = [
        ['id' => 'schemas-overview', 'label' => 'Overview', 'icon' => '📋', 'markdown' => 'overview.md', 'description' => 'Schema layout components for organizing content', 'keywords' => ['schema', 'layout', 'organize', 'structure'], 'view' => 'schemas::docs.sections.overview'],
        ['id' => 'schemas-section', 'label' => 'Section', 'icon' => '📦', 'markdown' => 'section.md', 'description' => 'Collapsible sections with headings', 'keywords' => ['section', 'collapsible', 'heading', 'container'], 'view' => 'schemas::docs.sections.section'],
        ['id' => 'schemas-tabs', 'label' => 'Tabs', 'icon' => '📑', 'markdown' => 'tabs.md', 'description' => 'Tabbed content panels', 'keywords' => ['tabs', 'tab', 'panel', 'navigation'], 'view' => 'schemas::docs.sections.tabs'],
        ['id' => 'schemas-grid', 'label' => 'Grid', 'icon' => '⊞', 'markdown' => 'grid.md', 'description' => 'Responsive grid layouts', 'keywords' => ['grid', 'columns', 'layout', 'responsive'], 'view' => 'schemas::docs.sections.grid'],
        ['id' => 'schemas-wizard', 'label' => 'Wizard', 'icon' => '🧙', 'markdown' => 'wizard.md', 'description' => 'Multi-step wizard forms', 'keywords' => ['wizard', 'steps', 'multi-step', 'form'], 'view' => 'schemas::docs.sections.wizard'],
        ['id' => 'schemas-fieldset', 'label' => 'Fieldset', 'icon' => '📝', 'markdown' => 'fieldset.md', 'description' => 'Group related fields with a legend', 'keywords' => ['fieldset', 'legend', 'group', 'form'], 'view' => 'schemas::docs.sections.fieldset'],
        ['id' => 'schemas-split', 'label' => 'Split', 'icon' => '↔️', 'markdown' => 'split.md', 'description' => 'Two-column layouts with configurable ratios', 'keywords' => ['split', 'two-column', 'sidebar', 'layout'], 'view' => 'schemas::docs.sections.split'],
        ['id' => 'schemas-columns', 'label' => 'Columns', 'icon' => '▤', 'markdown' => 'columns.md', 'description' => 'Simple equal-width column layouts', 'keywords' => ['columns', 'equal', 'layout', 'grid'], 'view' => 'schemas::docs.sections.columns'],
        ['id' => 'schemas-flex', 'label' => 'Flex', 'icon' => '↔️', 'markdown' => 'flex.md', 'description' => 'Flexible width layouts using flexbox', 'keywords' => ['flex', 'flexbox', 'layout', 'responsive', 'grow'], 'view' => 'schemas::docs.sections.flex'],
        ['id' => 'schemas-empty-state', 'label' => 'Empty State', 'icon' => '📭', 'markdown' => 'empty-state.md', 'description' => 'Display meaningful empty states', 'keywords' => ['empty', 'state', 'placeholder', 'no-content'], 'view' => 'schemas::docs.sections.empty-state'],
        ['id' => 'schemas-text', 'label' => 'Text', 'icon' => '📝', 'markdown' => 'text.md', 'description' => 'Display styled text content and badges', 'keywords' => ['text', 'badge', 'content', 'typography'], 'view' => 'schemas::docs.sections.text'],
        ['id' => 'schemas-icon', 'label' => 'Icon', 'icon' => '🎯', 'markdown' => 'icon.md', 'description' => 'Display SVG icons with colors and sizes', 'keywords' => ['icon', 'svg', 'symbol', 'graphic'], 'view' => 'schemas::docs.sections.icon'],
        ['id' => 'schemas-image', 'label' => 'Image', 'icon' => '🖼️', 'markdown' => 'image.md', 'description' => 'Display images with alignment and styling', 'keywords' => ['image', 'photo', 'picture', 'avatar'], 'view' => 'schemas::docs.sections.image'],
        ['id' => 'schemas-unordered-list', 'label' => 'List', 'icon' => '📋', 'markdown' => 'unordered-list.md', 'description' => 'Display bullet point lists', 'keywords' => ['list', 'bullet', 'unordered', 'items'], 'view' => 'schemas::docs.sections.unordered-list'],
        ['id' => 'schemas-custom-components', 'label' => 'Custom Components', 'icon' => '🔧', 'markdown' => 'custom-components.md', 'description' => 'Create your own custom schema components', 'keywords' => ['custom', 'component', 'create', 'make', 'extend'], 'view' => 'schemas::docs.sections.custom-components'],
    ];

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
                Console\MakeSchemaComponentCommand::class,
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
        if (! $this->app->bound('accelade.docs')) {
            return;
        }

        /** @var DocsRegistry $registry */
        $registry = $this->app->make('accelade.docs');

        $registry->registerPackage('schemas', __DIR__.'/../docs');
        $registry->registerGroup('schemas', 'Schemas', '📐', 40);

        foreach ($this->getDocumentationSections() as $section) {
            $this->registerSection($registry, $section);
        }
    }

    /**
     * Register a single documentation section.
     *
     * @param  array<string, mixed>  $section
     */
    protected function registerSection(DocsRegistry $registry, array $section): void
    {
        $registry->section($section['id'])
            ->label($section['label'])
            ->icon($section['icon'])
            ->markdown($section['markdown'])
            ->description($section['description'])
            ->keywords($section['keywords'])
            ->demo()
            ->view($section['view'])
            ->package('schemas')
            ->inGroup('schemas')
            ->register();
    }

    /**
     * Get documentation section definitions.
     *
     * @return array<int, array<string, mixed>>
     */
    protected function getDocumentationSections(): array
    {
        return self::DOCUMENTATION_SECTIONS;
    }
}
