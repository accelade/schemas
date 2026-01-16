# Schemas

Accelade Schemas provides layout components for organizing forms, content, and data displays in your Laravel applications.

## Installation

The schemas package is included with Accelade. No additional installation is required.

## Available Components

| Component | Description |
|-----------|-------------|
| `Section` | Collapsible sections with heading, description, and icon |
| `Tabs` | Tabbed content panels with query string persistence |
| `Tab` | Individual tab within Tabs |
| `Grid` | Responsive multi-column grid layout |
| `Columns` | Simple equal-width columns |
| `Fieldset` | HTML fieldset with legend |
| `Split` | Two-column split layout with configurable ratios |
| `Wizard` | Multi-step form wizard |
| `Step` | Individual step within Wizard |

## Basic Usage

### Blade Components

```blade
<x-accelade::section heading="User Settings" collapsible>
    <x-accelade::grid :columns="2">
        <!-- Form fields -->
    </x-accelade::grid>
</x-accelade::section>
```

### PHP Fluent API

```php
use Accelade\Schemas\Components\Section;
use Accelade\Schemas\Components\Grid;

$section = Section::make('Settings')
    ->heading('Application Settings')
    ->description('Configure your application')
    ->collapsible()
    ->columns(2)
    ->schema([
        // Child components
    ]);

// Render in Blade
{!! $section->render() !!}
```

## Features

- **Responsive** - All grid components are mobile-first responsive
- **Collapsible** - Sections support collapse/expand with Alpine.js
- **Nested** - Components can be nested inside each other
- **Accessible** - Proper ARIA attributes and keyboard navigation
- **Dark Mode** - Full dark mode support via Tailwind CSS
