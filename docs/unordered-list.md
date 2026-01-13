# UnorderedList Component

The UnorderedList component displays bullet point lists with customizable sizes and colors. Items can be plain strings or Text components for rich formatting.

## Basic Usage

```php
use Accelade\Schemas\Components\UnorderedList;

UnorderedList::make([
    'First item',
    'Second item',
    'Third item',
]);
```

## Blade Usage

```blade
<x-accelade::unordered-list :items="[
    'First item',
    'Second item',
    'Third item',
]" />
```

## Configuration

### Size

Control text and bullet size:

```php
UnorderedList::make($items)
    ->size('lg'); // xs, sm, md, lg, xl
```

### Colors

Set text and bullet colors:

```php
UnorderedList::make($items)
    ->color('muted')
    ->bulletColor('success');
```

### Rich Text Items

Use Text components for styled items:

```php
use Accelade\Schemas\Components\Text;

UnorderedList::make([
    'Plain text item',
    Text::make('Highlighted item')->color('primary'),
    Text::make('Warning item')->color('warning')->weight('bold'),
]);
```

## Usage Examples

### Feature List

```php
UnorderedList::make([
    'Unlimited projects',
    'Advanced analytics',
    'Priority support',
    'API access',
])
    ->bulletColor('success');
```

### Mixed Content

```php
UnorderedList::make([
    Text::make('Free tier')->badge()->color('gray'),
    Text::make('Pro tier')->badge()->color('primary'),
    Text::make('Enterprise')->badge()->color('warning'),
])
    ->size('lg');
```

## Available Methods

| Method | Description |
|--------|-------------|
| `items(array)` | Array of strings or Text components |
| `size(string)` | Text and bullet size (xs, sm, md, lg, xl) |
| `color(string)` | Text color |
| `bulletColor(string)` | Bullet point color |
