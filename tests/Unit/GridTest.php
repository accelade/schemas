<?php

declare(strict_types=1);

use Accelade\Schemas\Components\Grid;

it('can create a grid with name', function () {
    $grid = Grid::make('main-grid');

    expect($grid->getName())->toBe('main-grid');
});

it('can create a grid with columns directly', function () {
    $grid = Grid::make(3);

    expect($grid->getName())->toBe('grid');
    expect($grid->getColumns())->toBe(3);
});

it('can create a grid with responsive columns directly', function () {
    $grid = Grid::make(['default' => 1, 'md' => 2, 'lg' => 3]);

    expect($grid->getColumns())->toBe(['default' => 1, 'md' => 2, 'lg' => 3]);
});

it('can set columns', function () {
    $grid = Grid::make()
        ->columns(4);

    expect($grid->getColumns())->toBe(4);
});

it('can set gap', function () {
    $grid = Grid::make()
        ->gap('6');

    expect($grid->getGap())->toBe('6');
});

it('can have schema', function () {
    $child = Grid::make(2);
    $grid = Grid::make(3)
        ->schema([$child]);

    expect($grid->getSchema())->toHaveCount(1);
});

it('can convert to array', function () {
    $grid = Grid::make()
        ->columns(3)
        ->gap('8');

    $array = $grid->toArray();

    expect($array['type'])->toBe('Grid');
    expect($array['columns'])->toBe(3);
    expect($array['gap'])->toBe('8');
});
