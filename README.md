# Accelade Schemas

<p align="center">
<strong>Layout Components for Laravel Blade.</strong>
</p>

<p align="center">
<a href="https://github.com/fadymondy/accelade-schemas/actions"><img src="https://github.com/fadymondy/accelade-schemas/actions/workflows/tests.yml/badge.svg" alt="Tests"></a>
<a href="https://packagist.org/packages/accelade/schemas"><img src="https://img.shields.io/packagist/v/accelade/schemas" alt="Latest Version"></a>
<a href="https://packagist.org/packages/accelade/schemas"><img src="https://img.shields.io/packagist/dt/accelade/schemas" alt="Total Downloads"></a>
<a href="LICENSE"><img src="https://img.shields.io/badge/license-MIT-blue.svg" alt="License"></a>
</p>

---

Schema components for organizing forms, content, and data displays in your Laravel applications. Built on top of [Accelade](https://github.com/fadymondy/accelade) for reactive interactivity.

```blade
<x-accelade::section heading="User Profile" collapsible>
    <x-accelade::grid :columns="2">
        <input name="first_name" placeholder="First Name">
        <input name="last_name" placeholder="Last Name">
    </x-accelade::grid>
</x-accelade::section>
```

**That's it.** Collapsible sections, tabs, grids, wizards, and more. All with reactive state management.

---

## Features

- **Section** — Collapsible panels with headings, descriptions, and icons
- **Tabs** — Horizontal/vertical tabs with badges and persistence
- **Grid** — Responsive multi-column layouts
- **Columns** — Simple equal-width columns
- **Split** — Two-column layouts with configurable ratios
- **Fieldset** — HTML fieldset with legend
- **Wizard** — Multi-step form flows
- **Placeholder** — Static content, views, or HTML

---

## Installation

```bash
composer require accelade/schemas
```

The package extends Accelade's component namespace, so all components are available as `<x-accelade::*>`.

---

## Quick Start

### Section
```blade
<x-accelade::section
    heading="Personal Information"
    description="Update your profile details"
    collapsible
>
    <input name="name" placeholder="Full Name">
    <input name="email" placeholder="Email">
</x-accelade::section>
```

### Tabs
```blade
<x-accelade::tabs :component="$tabs" />
```

```php
use Accelade\Schemas\Components\Tabs;
use Accelade\Schemas\Components\Tab;

$tabs = Tabs::make()
    ->tabs([
        Tab::make('General')
            ->icon('<svg>...</svg>')
            ->schema([...]),
        Tab::make('Advanced')
            ->badge('3')
            ->schema([...]),
    ]);
```

### Grid
```blade
<x-accelade::grid :columns="3" gap="6">
    <div>Item 1</div>
    <div>Item 2</div>
    <div>Item 3</div>
</x-accelade::grid>
```

### Wizard
```blade
<x-accelade::wizard :component="$wizard" />
```

```php
use Accelade\Schemas\Components\Wizard;
use Accelade\Schemas\Components\Step;

$wizard = Wizard::make()
    ->steps([
        Step::make('Account')
            ->icon('<svg>...</svg>')
            ->schema([...]),
        Step::make('Profile')
            ->schema([...]),
        Step::make('Review')
            ->schema([...]),
    ])
    ->nextLabel('Continue')
    ->submitLabel('Create Account');
```

### Split Layout
```blade
<x-accelade::split ratio="1/3">
    <x-slot:start>
        <nav>Sidebar</nav>
    </x-slot:start>
    <x-slot:end>
        <main>Content</main>
    </x-slot:end>
</x-accelade::split>
```

### Fieldset
```blade
<x-accelade::fieldset legend="Contact Info" :columns="2">
    <input name="phone" placeholder="Phone">
    <input name="address" placeholder="Address">
</x-accelade::fieldset>
```

### Placeholder
```blade
<x-accelade::placeholder
    :view="'partials.terms'"
    label="Terms of Service"
/>
```

---

## Responsive Columns

All grid-based components support responsive column configurations:

```php
// Simple: 2 columns
Grid::make(2);

// Responsive: 1 on mobile, 2 on sm, 3 on lg
Grid::make(['default' => 1, 'sm' => 2, 'lg' => 3]);
```

```blade
<x-accelade::grid :columns="['default' => 1, 'sm' => 2, 'lg' => 3]">
    ...
</x-accelade::grid>
```

---

## Multi-Framework Support

Components automatically use the correct framework prefix for Accelade's reactivity:

| Framework | Directives |
|-----------|-----------|
| Vanilla JS | `a-show`, `a-class`, `@click` |
| Vue | `v-show`, `v-class`, `@click` |
| React | `data-state-show`, `data-state-class`, `@click` |
| Svelte | `s-show`, `s-class`, `@click` |
| Angular | `ng-show`, `ng-class`, `@click` |

---

## Object-Based API

All components support a fluent PHP API for programmatic rendering:

```php
use Accelade\Schemas\Components\Section;
use Accelade\Schemas\Components\Grid;
use Accelade\Schemas\Components\Tabs;
use Accelade\Schemas\Components\Tab;

$section = Section::make('settings')
    ->heading('Application Settings')
    ->description('Configure your app')
    ->icon('<svg>...</svg>')
    ->collapsible()
    ->collapsed()
    ->columns(2)
    ->schema([
        Grid::make(2)->schema([...]),
    ]);

// In Blade:
{!! $section->render() !!}
```

---

## Requirements

- PHP 8.2+
- Laravel 11.x or 12.x
- Accelade 0.2+

---

## Documentation

| Component | Description |
|-----------|-------------|
| [Section](docs/section.md) | Collapsible sections with headings |
| [Tabs](docs/tabs.md) | Tabbed content panels |
| [Grid](docs/grid.md) | Responsive grid layouts |
| [Wizard](docs/wizard.md) | Multi-step form wizard |
| [Fieldset](docs/fieldset.md) | Group fields with legend |
| [Split](docs/split.md) | Two-column layouts |
| [Columns](docs/columns.md) | Equal-width columns |
| [Placeholder](docs/placeholder.md) | Static content display |

---

## License

MIT License. See [LICENSE](LICENSE) for details.
