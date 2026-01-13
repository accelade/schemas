# Wizard Component

The Wizard component creates multi-step forms with navigation, progress indicators, and step validation.

## Basic Usage

```php
use Accelade\Schemas\Components\Wizard;
use Accelade\Schemas\Components\Step;

$wizard = Wizard::make()
    ->steps([
        Step::make('Account'),
        Step::make('Profile'),
        Step::make('Review'),
    ]);
```

## Steps with Content

```php
$wizard = Wizard::make()
    ->steps([
        Step::make('Account')
            ->description('Create your account')
            ->schema([
                Section::make('Credentials')
                    ->columns(2)
                    ->schema([...]),
            ]),
        Step::make('Profile')
            ->description('Complete your profile')
            ->schema([
                Section::make('Personal Info')
                    ->schema([...]),
            ]),
        Step::make('Confirm')
            ->description('Review and submit')
            ->schema([
                Section::make('Summary')
                    ->schema([...]),
            ]),
    ]);
```

## Step Icons

```php
Step::make('Account')
    ->icon('<svg class="w-4 h-4">...</svg>')
    ->schema([...]);
```

## Custom Navigation Labels

```php
$wizard = Wizard::make()
    ->steps([...])
    ->nextAction('Continue')
    ->previousAction('Go Back')
    ->submitAction('Create Account');
```

## Skippable Steps

Allow users to jump to any step:

```php
$wizard = Wizard::make()
    ->steps([...])
    ->skippable();
```

## Start on Specific Step

```php
$wizard = Wizard::make()
    ->steps([...])
    ->startOnStep(1); // 0-indexed, starts on second step
```

## Multi-Column Steps

```php
Step::make('Details')
    ->columns(2)
    ->schema([
        // Fields will be in 2-column grid
    ]);
```

## Conditional Steps

```php
Step::make('Admin Settings')
    ->hidden(fn() => !auth()->user()->isAdmin());
```

## Blade Rendering

```blade
@php
    $wizard = Wizard::make()
        ->steps([
            Step::make('Step 1')->schema([...]),
            Step::make('Step 2')->schema([...]),
        ])
        ->submitAction('Save');
@endphp

<form action="/submit" method="POST">
    @csrf
    {!! $wizard->render() !!}
</form>
```

## Properties

### Wizard

| Property | Type | Default | Description |
|----------|------|---------|-------------|
| `steps` | array | [] | Array of Step components |
| `startStep` | int | 0 | Initial step index |
| `skippable` | bool | false | Allow jumping to any step |
| `nextLabel` | string | 'Next' | Next button text |
| `previousLabel` | string | 'Previous' | Previous button text |
| `submitLabel` | string | 'Submit' | Final submit button text |

### Step

| Property | Type | Default | Description |
|----------|------|---------|-------------|
| `label` | string | null | Step title |
| `description` | string | null | Step subtitle |
| `icon` | string | null | SVG icon HTML |
| `columns` | int | 1 | Grid columns for step content |
| `schema` | array | [] | Step content components |
