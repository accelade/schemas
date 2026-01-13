# Section Component

The Section component creates a card-like container with optional heading, description, icon, and collapsibility.

## Basic Usage

```blade
<x-accelade::section heading="Personal Information">
    <!-- Content -->
</x-accelade::section>
```

## With Description

```blade
<x-accelade::section
    heading="Account Settings"
    description="Manage your account preferences"
>
    <!-- Content -->
</x-accelade::section>
```

## Collapsible Section

```blade
<x-accelade::section heading="Advanced Options" collapsible>
    <!-- Content that can be collapsed -->
</x-accelade::section>
```

## Initially Collapsed

```blade
<x-accelade::section heading="Debug Info" collapsible collapsed>
    <!-- Starts collapsed -->
</x-accelade::section>
```

## With Icon

```blade
<x-accelade::section
    heading="Security"
    icon='<svg class="w-5 h-5">...</svg>'
>
    <!-- Content -->
</x-accelade::section>
```

## Multi-Column Layout

```blade
<x-accelade::section heading="Contact Details" :columns="2">
    <div>First Name</div>
    <div>Last Name</div>
    <div>Email</div>
    <div>Phone</div>
</x-accelade::section>
```

## PHP API

```php
use Accelade\Schemas\Components\Section;

$section = Section::make('User Info')
    ->heading('User Information')
    ->description('Enter your details below')
    ->icon('<svg>...</svg>')
    ->collapsible()
    ->collapsed()
    ->columns(2)
    ->aside()      // Sidebar style
    ->compact()    // Reduced padding
    ->schema([
        // Child components
    ]);
```

## Properties

| Property | Type | Default | Description |
|----------|------|---------|-------------|
| `heading` | string | null | Section title |
| `description` | string | null | Subtitle/description text |
| `icon` | string | null | SVG icon HTML |
| `collapsible` | bool | false | Enable collapse/expand |
| `collapsed` | bool | false | Start collapsed |
| `columns` | int/array | 1 | Grid columns for content |
| `aside` | bool | false | Sidebar layout style |
| `compact` | bool | false | Reduced padding |
