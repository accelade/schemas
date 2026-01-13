# Text Component

The Text component displays styled text content with support for colors, sizes, weights, font families, badges, tooltips, and copy functionality.

## Basic Usage

```php
use Accelade\Schemas\Components\Text;

Text::make('Hello World')
    ->color('primary')
    ->size('lg');
```

## Blade Usage

```blade
<x-accelade::text content="Hello World" color="success" />

{{-- As a badge --}}
<x-accelade::text content="New" :badge="true" color="primary" />
```

## Configuration

### Colors

```php
Text::make('Status')
    ->color('success'); // neutral, primary, success, warning, danger, info, muted
```

### Sizes

```php
Text::make('Large Text')
    ->size('xl'); // xs, sm, md, lg, xl, 2xl
```

### Font Weight

```php
Text::make('Bold Text')
    ->weight('bold'); // thin, light, normal, medium, semibold, bold, extrabold, black
```

### Font Family

```php
Text::make('Monospace')
    ->fontFamily('mono'); // sans, serif, mono
```

### Badge Style

Display text as a styled badge:

```php
Text::make('Featured')
    ->badge()
    ->color('warning')
    ->icon('<svg>...</svg>');
```

### Tooltip

Add a hover tooltip:

```php
Text::make('Hover me')
    ->tooltip('This is additional information');
```

### Copyable

Make text copyable to clipboard:

```php
Text::make('API-KEY-12345')
    ->copyable()
    ->fontFamily('mono');
```

## Available Methods

| Method | Description |
|--------|-------------|
| `content(string)` | The text content |
| `color(string)` | Text color |
| `badge(bool)` | Display as pill badge |
| `size(string)` | Font size |
| `weight(string)` | Font weight |
| `fontFamily(string)` | Font family |
| `icon(string)` | SVG icon (for badge mode) |
| `iconPosition(string)` | Icon position (before, after) |
| `tooltip(string)` | Hover tooltip text |
| `copyable(bool)` | Enable copy to clipboard |
