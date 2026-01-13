<?php

declare(strict_types=1);

use Accelade\Schemas\Components\EmptyState;

it('can create an empty state', function () {
    $emptyState = EmptyState::make();

    expect($emptyState)->toBeInstanceOf(EmptyState::class);
});

it('can set heading', function () {
    $emptyState = EmptyState::make()
        ->heading('No posts yet');

    expect($emptyState->getHeading())->toBe('No posts yet');
});

it('can set description', function () {
    $emptyState = EmptyState::make()
        ->description('Create your first post to get started.');

    expect($emptyState->getDescription())->toBe('Create your first post to get started.');
});

it('can set icon', function () {
    $emptyState = EmptyState::make()
        ->icon('<svg>...</svg>');

    expect($emptyState->getIcon())->toBe('<svg>...</svg>');
});

it('has default icon color of gray', function () {
    $emptyState = EmptyState::make();

    expect($emptyState->getIconColor())->toBe('gray');
});

it('can set icon color', function () {
    $emptyState = EmptyState::make()
        ->iconColor('primary');

    expect($emptyState->getIconColor())->toBe('primary');
});

it('has default icon size of lg', function () {
    $emptyState = EmptyState::make();

    expect($emptyState->getIconSize())->toBe('lg');
});

it('can set icon size', function () {
    $emptyState = EmptyState::make()
        ->iconSize('xl');

    expect($emptyState->getIconSize())->toBe('xl');
});

it('is contained by default', function () {
    $emptyState = EmptyState::make();

    expect($emptyState->isContained())->toBeTrue();
});

it('can disable contained mode', function () {
    $emptyState = EmptyState::make()
        ->contained(false);

    expect($emptyState->isContained())->toBeFalse();
});

it('can convert to array', function () {
    $emptyState = EmptyState::make()
        ->heading('No items')
        ->description('Add some items')
        ->icon('<svg>...</svg>')
        ->iconColor('primary')
        ->iconSize('xl');

    $array = $emptyState->toArray();

    expect($array['type'])->toBe('EmptyState');
    expect($array['heading'])->toBe('No items');
    expect($array['description'])->toBe('Add some items');
    expect($array['icon'])->toBe('<svg>...</svg>');
    expect($array['iconColor'])->toBe('primary');
    expect($array['iconSize'])->toBe('xl');
});
