# Grid Component

The Grid component creates responsive multi-column layouts with configurable gaps.

## Basic Usage

```blade
<x-accelade::grid :columns="2">
    <div>Column 1</div>
    <div>Column 2</div>
</x-accelade::grid>
```

## Column Counts

```blade
{{-- 3 columns --}}
<x-accelade::grid :columns="3">
    <div>1</div>
    <div>2</div>
    <div>3</div>
</x-accelade::grid>

{{-- 4 columns --}}
<x-accelade::grid :columns="4">
    <div>1</div>
    <div>2</div>
    <div>3</div>
    <div>4</div>
</x-accelade::grid>
```

## Responsive Columns

Pass an array for breakpoint-specific columns:

```blade
<x-accelade::grid :columns="['default' => 1, 'sm' => 2, 'lg' => 4]">
    <!-- 1 col on mobile, 2 on sm, 4 on lg -->
</x-accelade::grid>
```

## Custom Gap

```blade
<x-accelade::grid :columns="3" gap="8">
    <!-- Larger gap between items -->
</x-accelade::grid>
```

## PHP API

```php
use Accelade\Schemas\Components\Grid;

// Simple columns
$grid = Grid::make(3)
    ->gap('6')
    ->schema([...]);

// Responsive columns
$grid = Grid::make(['default' => 1, 'md' => 2, 'lg' => 3])
    ->schema([...]);

// Named grid
$grid = Grid::make('form-grid')
    ->columns(2)
    ->schema([...]);
```

## Nesting Grids

```blade
<x-accelade::section heading="Form">
    <x-accelade::grid :columns="2">
        <x-accelade::grid :columns="2">
            <div>Nested 1</div>
            <div>Nested 2</div>
        </x-accelade::grid>
        <div>Right column</div>
    </x-accelade::grid>
</x-accelade::section>
```

## Properties

| Property | Type | Default | Description |
|----------|------|---------|-------------|
| `columns` | int/array | 1 | Number of columns or responsive config |
| `gap` | string | '4' | Tailwind gap size (1-12) |
| `schema` | array | [] | Child components |

## Responsive Behavior

The grid automatically adjusts on smaller screens:

| Columns | Mobile | Tablet (sm) | Desktop (lg) |
|---------|--------|-------------|--------------|
| 1 | 1 | 1 | 1 |
| 2 | 1 | 2 | 2 |
| 3 | 1 | 2 | 3 |
| 4 | 1 | 2 | 4 |
| 5 | 1 | 2 | 5 |
| 6 | 1 | 3 | 6 |
