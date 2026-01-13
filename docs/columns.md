# Columns Component

The Columns component creates simple equal-width column layouts. It's similar to Grid but optimized for equal-width columns.

## Basic Usage

```blade
<x-accelade::columns :columns="2">
    <div>Column 1</div>
    <div>Column 2</div>
</x-accelade::columns>
```

## Column Counts

```blade
{{-- 2 columns --}}
<x-accelade::columns :columns="2">
    <x-forms::text-input name="first_name" />
    <x-forms::text-input name="last_name" />
</x-accelade::columns>

{{-- 3 columns --}}
<x-accelade::columns :columns="3">
    <x-stat-card title="Sales" value="$12k" />
    <x-stat-card title="Revenue" value="$45k" />
    <x-stat-card title="Growth" value="23%" />
</x-accelade::columns>

{{-- 4 columns --}}
<x-accelade::columns :columns="4">
    @foreach($quarters as $quarter)
        <x-quarter-card :quarter="$quarter" />
    @endforeach
</x-accelade::columns>
```

## Custom Gap

```blade
{{-- Tight gap --}}
<x-accelade::columns :columns="4" gap="2">
    ...
</x-accelade::columns>

{{-- Loose gap --}}
<x-accelade::columns :columns="4" gap="8">
    ...
</x-accelade::columns>
```

## Responsive Columns

```blade
<x-accelade::columns :columns="['default' => 1, 'sm' => 2, 'lg' => 4]">
    {{-- 1 col on mobile, 2 on tablet, 4 on desktop --}}
    <x-card />
    <x-card />
    <x-card />
    <x-card />
</x-accelade::columns>
```

## PHP API

```php
use Accelade\Schemas\Components\Columns;

// Simple columns
$columns = Columns::make(2)
    ->schema([
        TextInput::make('first_name'),
        TextInput::make('last_name'),
    ]);

// With custom gap
$columns = Columns::make(3)
    ->gap('6')
    ->schema([
        StatCard::make('sales'),
        StatCard::make('revenue'),
        StatCard::make('growth'),
    ]);

// Responsive
$columns = Columns::make(['default' => 1, 'md' => 2, 'lg' => 4])
    ->schema([...]);
```

## Properties

| Property | Type | Default | Description |
|----------|------|---------|-------------|
| `columns` | int/array | 2 | Number of columns or responsive config |
| `gap` | string | '4' | Gap between columns (Tailwind spacing) |
| `schema` | array | [] | Child components |

## Responsive Behavior

The component automatically adjusts columns on smaller screens:

| Columns | Mobile | Tablet (sm) | Desktop (lg) |
|---------|--------|-------------|--------------|
| 1 | 1 | 1 | 1 |
| 2 | 1 | 2 | 2 |
| 3 | 1 | 2 | 3 |
| 4 | 1 | 2 | 4 |
| 5 | 1 | 2 | 5 |
| 6 | 1 | 3 | 6 |

## Columns vs Grid

Both components create column layouts, but:

| Feature | Columns | Grid |
|---------|---------|------|
| Focus | Equal-width columns | Flexible grid layouts |
| Default columns | 2 | 1 |
| Use case | Side-by-side fields | Complex layouts |

Choose **Columns** when you want simple, equal-width columns.
Choose **Grid** when you need more control over column sizing.
