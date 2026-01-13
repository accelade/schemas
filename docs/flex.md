# Flex Component

The Flex component provides flexible width layouts using CSS flexbox. Unlike Grid, Flex allows components to have variable widths based on content or explicit grow/shrink settings.

## Basic Usage

```php
use Accelade\Schemas\Components\Flex;

Flex::make()
    ->schema([
        // Your components here
    ]);
```

## Blade Usage

```blade
<x-accelade::flex gap="4">
    <div class="flex-1">Item 1</div>
    <div class="flex-1">Item 2</div>
    <div class="flex-1">Item 3</div>
</x-accelade::flex>
```

## Configuration

### Breakpoints

Set when the flex layout activates using `from()`:

```php
Flex::make()
    ->from('lg') // Flex activates at large screens
    ->schema([...]);
```

### Gap

Control spacing between items:

```php
Flex::make()
    ->gap('6')
    ->schema([...]);
```

### Direction

Set the flex direction:

```php
Flex::make()
    ->column() // or ->row()
    ->schema([...]);
```

### Justify Content

Control horizontal alignment:

```php
Flex::make()
    ->justifyBetween() // start, center, end, between, around
    ->schema([...]);
```

### Align Items

Control vertical alignment:

```php
Flex::make()
    ->alignCenter() // start, center, end, stretch
    ->schema([...]);
```

## Available Methods

| Method | Description |
|--------|-------------|
| `from(string)` | Breakpoint at which flex activates |
| `gap(string)` | Gap between items (Tailwind scale) |
| `wrap(bool)` | Enable/disable flex wrapping |
| `direction(string)` | Flex direction (row, col) |
| `column()` | Shortcut for column direction |
| `row()` | Shortcut for row direction |
| `justify(string)` | Justify content setting |
| `justifyStart()` | Justify to start |
| `justifyCenter()` | Justify to center |
| `justifyEnd()` | Justify to end |
| `justifyBetween()` | Space between items |
| `justifyAround()` | Space around items |
| `align(string)` | Align items setting |
| `alignStart()` | Align to start |
| `alignCenter()` | Align to center |
| `alignEnd()` | Align to end |
