# Custom Components

Create your own custom schema components to extend the Accelade Schemas package with components tailored to your application's needs.

## Generating a Component

Use the Artisan command to scaffold a new component:

```bash
php artisan accelade:schema-component Chart
```

This creates two files:
- `app/Schemas/Components/Chart.php` - The component class
- `resources/views/schemas/components/chart.blade.php` - The Blade view

## Component Class Structure

The generated component extends the base `Component` class:

```php
namespace App\Schemas\Components;

use Accelade\Schemas\Component;
use Accelade\Schemas\Concerns\HasSchema;
use Closure;

class Chart extends Component
{
    use HasSchema;

    protected string|Closure|null $heading = null;
    protected string|Closure|null $description = null;

    public static function make(?string $heading = null): static
    {
        $static = new static;
        $static->heading = $heading;
        $static->setUp();

        return $static;
    }

    // Configuration methods...
}
```

## Adding Configuration Methods

Add fluent configuration methods for your component:

```php
protected string|Closure|null $chartType = 'bar';
protected array|Closure $data = [];

public function type(string|Closure $chartType): static
{
    $this->chartType = $chartType;
    return $this;
}

public function getType(): string
{
    return $this->evaluate($this->chartType) ?? 'bar';
}

public function data(array|Closure $data): static
{
    $this->data = $data;
    return $this;
}

public function getData(): array
{
    return $this->evaluate($this->data) ?? [];
}
```

## Supporting Closures

The `evaluate()` method processes closures with Laravel's service container:

```php
Chart::make('Sales')
    ->type('line')
    ->data(fn () => Order::query()
        ->selectRaw('DATE(created_at) as date, SUM(total) as total')
        ->groupBy('date')
        ->get()
        ->toArray()
    );
```

## View Data

Pass data to your Blade view by overriding `getViewData()`:

```php
protected function getViewData(): array
{
    return array_merge(parent::getViewData(), [
        'heading' => $this->getHeading(),
        'chartType' => $this->getType(),
        'chartData' => $this->getData(),
    ]);
}
```

## Available Traits

Extend functionality with built-in traits:

| Trait | Description |
|-------|-------------|
| `HasSchema` | Allows nesting child components |
| `HasColumns` | Adds responsive column configuration |
| `CanBeCollapsible` | Adds collapse/expand functionality |

```php
use Accelade\Schemas\Concerns\HasSchema;
use Accelade\Schemas\Concerns\HasColumns;
use Accelade\Schemas\Concerns\CanBeCollapsible;

class CustomCard extends Component
{
    use HasSchema;
    use HasColumns;
    use CanBeCollapsible;
}
```

## Usage

Use your custom component like any built-in component:

```php
use App\Schemas\Components\Chart;

Chart::make('Monthly Revenue')
    ->description('Revenue over the last 12 months')
    ->type('line')
    ->data($revenueData);
```

Or render it in Blade:

```blade
{!! $chart->render() !!}
```
