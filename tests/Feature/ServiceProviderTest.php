<?php

declare(strict_types=1);

use Illuminate\Support\Facades\View;

it('registers the config', function () {
    expect(config('schemas.enabled'))->toBeTrue();
});

it('can render section component', function () {
    $html = View::make('schemas::components.section', [
        'heading' => 'Test Section',
        'slot' => 'Content',
    ])->render();

    expect($html)->toContain('Test Section');
    expect($html)->toContain('Content');
});

it('can render grid component', function () {
    $html = View::make('schemas::components.grid', [
        'columns' => 2,
        'slot' => 'Grid content',
    ])->render();

    expect($html)->toContain('Grid content');
    expect($html)->toContain('grid-cols-1');
});

it('can render fieldset component', function () {
    $html = View::make('schemas::components.fieldset', [
        'legend' => 'User Info',
        'slot' => 'Fieldset content',
    ])->render();

    expect($html)->toContain('User Info');
    expect($html)->toContain('Fieldset content');
});

it('loads views under accelade namespace', function () {
    expect(View::exists('accelade::components.section'))->toBeTrue();
    expect(View::exists('accelade::components.tabs'))->toBeTrue();
    expect(View::exists('accelade::components.grid'))->toBeTrue();
});

it('loads views under schemas namespace', function () {
    expect(View::exists('schemas::components.section'))->toBeTrue();
    expect(View::exists('schemas::components.tabs'))->toBeTrue();
    expect(View::exists('schemas::components.grid'))->toBeTrue();
});
