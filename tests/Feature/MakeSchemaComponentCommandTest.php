<?php

declare(strict_types=1);

use Illuminate\Support\Facades\File;

beforeEach(function () {
    // Clean up any existing test files
    $componentPath = app_path('Schemas/Components');
    $viewPath = resource_path('views/schemas/components');

    if (File::isDirectory($componentPath)) {
        File::deleteDirectory($componentPath);
    }

    if (File::isDirectory($viewPath)) {
        File::deleteDirectory($viewPath);
    }
});

afterEach(function () {
    // Clean up after tests
    $componentPath = app_path('Schemas/Components');
    $viewPath = resource_path('views/schemas/components');

    if (File::isDirectory($componentPath)) {
        File::deleteDirectory($componentPath);
    }

    if (File::isDirectory($viewPath)) {
        File::deleteDirectory($viewPath);
    }

    // Also clean up parent directories if empty
    if (File::isDirectory(app_path('Schemas')) && count(File::allFiles(app_path('Schemas'))) === 0) {
        File::deleteDirectory(app_path('Schemas'));
    }

    if (File::isDirectory(resource_path('views/schemas')) && count(File::allFiles(resource_path('views/schemas'))) === 0) {
        File::deleteDirectory(resource_path('views/schemas'));
    }
});

it('creates a schema component class and view', function () {
    $this->artisan('accelade:schema-component', ['name' => 'TestChart'])
        ->assertSuccessful();

    expect(File::exists(app_path('Schemas/Components/TestChart.php')))->toBeTrue();
    expect(File::exists(resource_path('views/schemas/components/test-chart.blade.php')))->toBeTrue();
});

it('generates correct component class content', function () {
    $this->artisan('accelade:schema-component', ['name' => 'MyWidget'])
        ->assertSuccessful();

    $content = File::get(app_path('Schemas/Components/MyWidget.php'));

    expect($content)
        ->toContain('namespace App\Schemas\Components;')
        ->toContain('class MyWidget extends Component')
        ->toContain('use Accelade\Schemas\Component;')
        ->toContain('use Accelade\Schemas\Concerns\HasSchema;')
        ->toContain('public static function make(')
        ->toContain('protected function getView(): string')
        ->toContain("return 'schemas.components.my-widget';");
});

it('generates correct view content', function () {
    $this->artisan('accelade:schema-component', ['name' => 'DataCard'])
        ->assertSuccessful();

    $content = File::get(resource_path('views/schemas/components/data-card.blade.php'));

    expect($content)
        ->toContain('schema-data-card')
        ->toContain('$component->getHeading()')
        ->toContain('$component->getDescription()');
});

it('handles studly case names correctly', function () {
    $this->artisan('accelade:schema-component', ['name' => 'user-profile-card'])
        ->assertSuccessful();

    expect(File::exists(app_path('Schemas/Components/UserProfileCard.php')))->toBeTrue();
    expect(File::exists(resource_path('views/schemas/components/user-profile-card.blade.php')))->toBeTrue();

    $content = File::get(app_path('Schemas/Components/UserProfileCard.php'));
    expect($content)->toContain('class UserProfileCard extends Component');
});

it('does not overwrite existing files without force flag', function () {
    // Create the component first
    $this->artisan('accelade:schema-component', ['name' => 'ExistingComponent'])
        ->assertSuccessful();

    $originalContent = File::get(app_path('Schemas/Components/ExistingComponent.php'));

    // Modify the file
    File::put(app_path('Schemas/Components/ExistingComponent.php'), '<?php // modified');

    // Try to create again without force
    $this->artisan('accelade:schema-component', ['name' => 'ExistingComponent']);

    // File should still have modified content
    expect(File::get(app_path('Schemas/Components/ExistingComponent.php')))->toBe('<?php // modified');
});

it('overwrites existing files with force flag', function () {
    // Create the component first
    $this->artisan('accelade:schema-component', ['name' => 'ForceComponent'])
        ->assertSuccessful();

    // Modify the file
    File::put(app_path('Schemas/Components/ForceComponent.php'), '<?php // modified');

    // Run with force flag
    $this->artisan('accelade:schema-component', ['name' => 'ForceComponent', '--force' => true])
        ->assertSuccessful();

    // File should be regenerated
    $content = File::get(app_path('Schemas/Components/ForceComponent.php'));
    expect($content)
        ->toContain('class ForceComponent extends Component')
        ->not->toContain('// modified');
});

it('outputs correct success message', function () {
    $this->artisan('accelade:schema-component', ['name' => 'SuccessTest'])
        ->expectsOutputToContain('Schema component [SuccessTest] created successfully')
        ->assertSuccessful();
});

it('creates necessary directories', function () {
    // Ensure directories don't exist
    expect(File::isDirectory(app_path('Schemas/Components')))->toBeFalse();
    expect(File::isDirectory(resource_path('views/schemas/components')))->toBeFalse();

    $this->artisan('accelade:schema-component', ['name' => 'NewComponent'])
        ->assertSuccessful();

    expect(File::isDirectory(app_path('Schemas/Components')))->toBeTrue();
    expect(File::isDirectory(resource_path('views/schemas/components')))->toBeTrue();
});
