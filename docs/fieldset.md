# Fieldset Component

The Fieldset component groups related fields using the native HTML fieldset element with a legend.

## Basic Usage

```blade
<x-accelade::fieldset legend="Personal Information">
    <x-forms::text-input name="first_name" />
    <x-forms::text-input name="last_name" />
</x-accelade::fieldset>
```

## With Columns

```blade
<x-accelade::fieldset legend="Contact Details" :columns="2">
    <x-forms::text-input name="email" />
    <x-forms::text-input name="phone" />
    <x-forms::text-input name="city" />
    <x-forms::select name="country" />
</x-accelade::fieldset>
```

## Nested Fieldsets

```blade
<x-accelade::fieldset legend="Shipping Information">
    <x-accelade::fieldset legend="Address" :columns="2">
        <x-forms::text-input name="street" class="col-span-full" />
        <x-forms::text-input name="city" />
        <x-forms::text-input name="zip" />
    </x-accelade::fieldset>

    <x-accelade::fieldset legend="Delivery Options">
        <x-forms::radio-group name="delivery" :options="$deliveryOptions" />
    </x-accelade::fieldset>
</x-accelade::fieldset>
```

## Responsive Columns

```blade
<x-accelade::fieldset legend="Profile" :columns="['default' => 1, 'sm' => 2, 'lg' => 3]">
    <x-forms::text-input name="name" />
    <x-forms::text-input name="email" />
    <x-forms::text-input name="phone" />
</x-accelade::fieldset>
```

## PHP API

```php
use Accelade\Schemas\Components\Fieldset;

// Basic fieldset
$fieldset = Fieldset::make('Personal Information')
    ->schema([
        TextInput::make('first_name'),
        TextInput::make('last_name'),
    ]);

// With columns
$fieldset = Fieldset::make('shipping')
    ->legend('Shipping Address')
    ->columns(2)
    ->schema([
        TextInput::make('address'),
        TextInput::make('city'),
        TextInput::make('zip'),
        Select::make('country'),
    ]);

// Responsive columns
$fieldset = Fieldset::make('contact')
    ->legend('Contact Info')
    ->columns(['default' => 1, 'md' => 2])
    ->schema([...]);
```

## Properties

| Property | Type | Default | Description |
|----------|------|---------|-------------|
| `legend` | string/Closure | null | Legend text (auto-set from name) |
| `columns` | int/array | 1 | Number of columns for the grid |
| `schema` | array | [] | Child components |

## Styling

The fieldset has default styling:
- Rounded corners with border
- Proper dark mode support
- Legend with appropriate padding

You can customize with extra attributes:

```blade
<x-accelade::fieldset
    legend="Custom Style"
    class="border-primary-500 bg-primary-50 dark:bg-primary-900/20"
>
    ...
</x-accelade::fieldset>
```
