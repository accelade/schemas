# Empty State Component

The Empty State component displays a meaningful placeholder when no content is available. It guides users toward their next action with an optional icon, heading, description, and action buttons.

## Basic Usage

```php
use Accelade\Schemas\Components\EmptyState;

EmptyState::make()
    ->heading('No posts yet')
    ->description('Get started by creating your first blog post.')
    ->icon('<svg>...</svg>');
```

## Blade Usage

```blade
<x-accelade::empty-state
    heading="No results found"
    description="Try adjusting your search filters."
    :icon="$searchIcon"
    iconColor="blue"
>
    <button>Clear filters</button>
</x-accelade::empty-state>
```

## Configuration

### Heading and Description

```php
EmptyState::make()
    ->heading('No items')
    ->description('Create your first item to get started.');
```

### Icon

Add a visual icon with customizable color and size:

```php
EmptyState::make()
    ->icon('<svg>...</svg>')
    ->iconColor('primary') // gray, primary, success, warning, danger, info
    ->iconSize('xl'); // xs, sm, md, lg, xl
```

### Container Style

Control the container appearance:

```php
EmptyState::make()
    ->contained(false) // Remove container styling
    ->heading('No selection');
```

### With Actions

Add action buttons using the schema:

```php
EmptyState::make()
    ->heading('No posts')
    ->schema([
        Button::make('Create Post')->primary(),
        Button::make('Import')->secondary(),
    ]);
```

## Available Methods

| Method | Description |
|--------|-------------|
| `heading(string)` | Main heading text |
| `description(string)` | Description text below heading |
| `icon(string)` | SVG icon markup |
| `iconColor(string)` | Icon color (gray, primary, success, warning, danger, info) |
| `iconSize(string)` | Icon size (xs, sm, md, lg, xl) |
| `contained(bool)` | Show with container styling |
| `schema(array)` | Child components (typically action buttons) |
