# Icon Component

The Icon component displays SVG icons with customizable colors, sizes, and tooltips.

## Basic Usage

```php
use Accelade\Schemas\Components\Icon;

Icon::make('<svg>...</svg>')
    ->color('success')
    ->size('lg');
```

## Blade Usage

```blade
<x-accelade::svg-icon
    :icon="$checkIcon"
    color="success"
    size="lg"
    tooltip="Verified"
/>
```

## Configuration

### Colors

```php
Icon::make('<svg>...</svg>')
    ->color('danger'); // neutral, primary, success, warning, danger, info, muted
```

### Sizes

```php
Icon::make('<svg>...</svg>')
    ->size('xl'); // xs, sm, md, lg, xl, 2xl
```

### Tooltip

Add a hover tooltip:

```php
Icon::make('<svg>...</svg>')
    ->tooltip('Click to edit');
```

## Usage Examples

### Status Indicators

```php
Icon::make($checkIcon)->color('success')->tooltip('Completed');
Icon::make($warningIcon)->color('warning')->tooltip('Needs attention');
Icon::make($errorIcon)->color('danger')->tooltip('Failed');
```

### Navigation Icons

```blade
<x-accelade::flex gap="4">
    <x-accelade::svg-icon :icon="$homeIcon" size="lg" />
    <x-accelade::svg-icon :icon="$settingsIcon" size="lg" />
    <x-accelade::svg-icon :icon="$userIcon" size="lg" />
</x-accelade::flex>
```

## Available Methods

| Method | Description |
|--------|-------------|
| `icon(string)` | SVG icon markup |
| `color(string)` | Icon color |
| `size(string)` | Icon size (xs, sm, md, lg, xl, 2xl) |
| `tooltip(string)` | Hover tooltip text |
