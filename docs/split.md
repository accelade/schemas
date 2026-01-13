# Split Component

The Split component creates two-column layouts with configurable width ratios.

## Basic Usage

```blade
<x-accelade::split>
    <x-slot:left>
        Left content (50%)
    </x-slot:left>
    <x-slot:right>
        Right content (50%)
    </x-slot:right>
</x-accelade::split>
```

## Width Ratios

### Sidebar Layout (1/3 - 2/3)

```blade
<x-accelade::split leftWidth="1/3" rightWidth="2/3">
    <x-slot:left>
        <nav>Sidebar navigation</nav>
    </x-slot:left>
    <x-slot:right>
        <main>Main content area</main>
    </x-slot:right>
</x-accelade::split>
```

### Content with Aside (2/3 - 1/3)

```blade
<x-accelade::split leftWidth="2/3" rightWidth="1/3">
    <x-slot:left>
        <article>Main article content</article>
    </x-slot:left>
    <x-slot:right>
        <aside>Related links</aside>
    </x-slot:right>
</x-accelade::split>
```

### Quarter Layouts

```blade
{{-- 1/4 - 3/4 --}}
<x-accelade::split leftWidth="1/4" rightWidth="3/4">
    ...
</x-accelade::split>

{{-- 3/4 - 1/4 --}}
<x-accelade::split leftWidth="3/4" rightWidth="1/4">
    ...
</x-accelade::split>
```

## Breakpoint Control

Control when the split layout applies:

```blade
{{-- Split on large screens only --}}
<x-accelade::split from="lg">
    ...
</x-accelade::split>

{{-- Split on small screens and up --}}
<x-accelade::split from="sm">
    ...
</x-accelade::split>
```

## Custom Gap

```blade
<x-accelade::split gap="8">
    <x-slot:left>More space</x-slot:left>
    <x-slot:right>Between columns</x-slot:right>
</x-accelade::split>
```

## PHP API

```php
use Accelade\Schemas\Components\Split;

// Basic split
$split = Split::make('layout')
    ->schema([
        Section::make('sidebar')->schema([...]),
        Section::make('content')->schema([...]),
    ]);

// Sidebar layout
$split = Split::make('dashboard')
    ->leftWidth('1/3')
    ->rightWidth('2/3')
    ->from('lg')
    ->gap('6')
    ->schema([
        Navigation::make(),
        Content::make(),
    ]);
```

## Properties

| Property | Type | Default | Description |
|----------|------|---------|-------------|
| `leftWidth` | string | '1/2' | Left column width |
| `rightWidth` | string | '1/2' | Right column width |
| `from` | string | 'md' | Breakpoint to apply split |
| `gap` | string | '4' | Gap between columns |
| `schema` | array | [] | Child components (first=left, second=right) |

## Available Widths

| Width | Description |
|-------|-------------|
| `1/2` | Half width (50%) |
| `1/3` | One third (33.33%) |
| `2/3` | Two thirds (66.67%) |
| `1/4` | Quarter (25%) |
| `3/4` | Three quarters (75%) |
| `1/5` | One fifth (20%) |
| `2/5` | Two fifths (40%) |
| `3/5` | Three fifths (60%) |
| `4/5` | Four fifths (80%) |

## Responsive Behavior

On screens smaller than the `from` breakpoint:
- Both columns stack vertically
- Each column takes full width
- Left column appears first, right column below
