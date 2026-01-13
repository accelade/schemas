# Tabs Component

The Tabs component creates tabbed content panels with optional icons, badges, and query string persistence.

## Basic Usage

```php
use Accelade\Schemas\Components\Tabs;
use Accelade\Schemas\Components\Tab;

$tabs = Tabs::make()
    ->tabs([
        Tab::make('General'),
        Tab::make('Advanced'),
        Tab::make('Security'),
    ]);
```

## With Icons

```php
$tabs = Tabs::make()
    ->tabs([
        Tab::make('Settings')
            ->icon('<svg class="w-4 h-4">...</svg>'),
        Tab::make('Users')
            ->icon('<svg class="w-4 h-4">...</svg>'),
    ]);
```

## With Badges

```php
$tabs = Tabs::make()
    ->tabs([
        Tab::make('Notifications')
            ->badge('5')
            ->badgeColor('danger'),
        Tab::make('Messages')
            ->badge('New')
            ->badgeColor('success'),
    ]);
```

## Query String Persistence

Persist the active tab in the URL query string:

```php
$tabs = Tabs::make()
    ->tabs([...])
    ->persistInQueryString('settings-tab');

// URL: /settings?settings-tab=1
```

## Vertical Tabs

```php
$tabs = Tabs::make()
    ->tabs([...])
    ->vertical();
```

## Without Container Styling

```php
$tabs = Tabs::make()
    ->tabs([...])
    ->contained(false);
```

## Tab Content

Each tab can contain nested schema components:

```php
Tab::make('Profile')
    ->schema([
        Section::make('Basic Info')
            ->columns(2)
            ->schema([...]),
        Section::make('Preferences')
            ->collapsible()
            ->schema([...]),
    ]);
```

## Conditional Tabs

```php
Tab::make('Admin')
    ->hidden(fn() => !auth()->user()->isAdmin());
```

## Blade Usage

```blade
@php
    $tabs = Tabs::make()->tabs([
        Tab::make('Tab 1')->schema([...]),
        Tab::make('Tab 2')->schema([...]),
    ]);
@endphp

{!! $tabs->render() !!}
```

## Properties

### Tabs

| Property | Type | Default | Description |
|----------|------|---------|-------------|
| `tabs` | array | [] | Array of Tab components |
| `activeTab` | int/string | 0 | Initial active tab |
| `vertical` | bool | false | Vertical tab layout |
| `contained` | bool | true | Card-style container |
| `persistInQueryString` | string | null | Query string key |

### Tab

| Property | Type | Default | Description |
|----------|------|---------|-------------|
| `label` | string | null | Tab button text |
| `icon` | string | null | SVG icon HTML |
| `badge` | string | null | Badge text |
| `badgeColor` | string | null | Badge color (primary, success, danger, warning) |
| `schema` | array | [] | Tab content components |
