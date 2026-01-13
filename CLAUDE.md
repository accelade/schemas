# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Accelade Schemas is a Laravel package that provides layout components for organizing forms, content, and data displays. It extends Accelade's Blade component system with Section, Tabs, Grid, Wizard, and other layout primitives.

## Common Commands

### Testing
```bash
# PHP tests (Pest) - run from package directory
cd packages/schemas
vendor/bin/pest --compact
```

### Code Quality
```bash
vendor/bin/pint packages/schemas/src  # Format PHP with Pint
```

## Architecture

### PHP Components (src/Components/)
- `Section.php` - Collapsible sections with heading, description, icon
- `Tabs.php` - Tabbed content container
- `Tab.php` - Individual tab within Tabs
- `Grid.php` - Responsive multi-column grid layout
- `Columns.php` - Simple equal-width columns
- `Fieldset.php` - HTML fieldset with legend
- `Split.php` - Two-column split layout with configurable ratios
- `Wizard.php` - Multi-step form wizard
- `Step.php` - Individual step within Wizard

### Concerns (src/Concerns/)
- `CanBeCollapsible` - Adds collapse/expand functionality
- `HasSchema` - Allows nesting child components
- `HasColumns` - Adds responsive column configuration

### Blade Views (resources/views/components/)
All components render as anonymous Blade components using Accelade's reactivity system for interactivity (collapse, tabs, wizard steps).

### Integration with Accelade
- Views are registered under `accelade` namespace for unified component access
- Components use `<x-accelade::section>`, `<x-accelade::tabs>`, etc.
- Uses Accelade's multi-stack reactivity directives with framework-specific prefixes:
  - `a-show`, `a-class`, `@click` (Vanilla JS - default)
  - `v-show`, `v-class` (Vue)
  - `data-state-show`, `data-state-class` (React)
  - `s-show`, `s-class` (Svelte)
  - `ng-show`, `ng-class` (Angular)
- Interactive components use `<x-accelade::toggle>` and `<x-accelade::data>` for state management

## Key Patterns

### Component API
```php
use Accelade\Schemas\Components\Section;
use Accelade\Schemas\Components\Grid;
use Accelade\Schemas\Components\Tabs;
use Accelade\Schemas\Components\Tab;

Section::make('Personal Info')
    ->heading('Personal Information')
    ->description('Enter your details')
    ->icon('<svg>...</svg>')
    ->collapsible()
    ->collapsed()
    ->columns(2)
    ->schema([...]);

Grid::make(3)
    ->gap('6')
    ->schema([...]);

Tabs::make()
    ->tabs([
        Tab::make('General')->icon('<svg>...')->badge('3'),
        Tab::make('Advanced')->hidden(fn() => !$user->isAdmin()),
    ])
    ->persistInQueryString('tab');
```

### Blade Component Usage
```blade
<x-accelade::section heading="User Details" collapsible>
    <x-accelade::grid :columns="2">
        <div>Field 1</div>
        <div>Field 2</div>
    </x-accelade::grid>
</x-accelade::section>

<x-accelade::tabs>
    {{-- Tab content via slots --}}
</x-accelade::tabs>

<x-accelade::wizard>
    {{-- Wizard steps --}}
</x-accelade::wizard>
```

### Object-Based Rendering
Components can be rendered programmatically:
```php
$section = Section::make('Settings')
    ->heading('Application Settings')
    ->schema([
        Grid::make(2)->schema([...]),
    ]);

// In Blade:
{!! $section->render() !!}
```

## Configuration

Key config options in `config/schemas.php`:
- `enabled` - Enable/disable the package
- `default_columns` - Default grid columns
- `asset_mode` - 'route' (dev) or 'published' (prod)
- `demo.enabled` - Enable demo routes

## Test Structure
- `tests/Unit/` - Unit tests for component classes
- `tests/Feature/` - Feature tests for service provider and view rendering
