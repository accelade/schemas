<?php

declare(strict_types=1);

use Accelade\Schemas\Components\Tab;

it('can create a tab with name', function () {
    $tab = Tab::make('Settings');

    expect($tab->getName())->toBe('Settings');
    expect($tab->getLabel())->toBe('Settings');
});

it('can set label', function () {
    $tab = Tab::make()
        ->label('Custom Label');

    expect($tab->getLabel())->toBe('Custom Label');
});

it('can set icon', function () {
    $tab = Tab::make()
        ->icon('<svg>...</svg>');

    expect($tab->getIcon())->toBe('<svg>...</svg>');
});

it('can set badge', function () {
    $tab = Tab::make()
        ->badge('5');

    expect($tab->getBadge())->toBe('5');
});

it('can set badge color', function () {
    $tab = Tab::make()
        ->badge('New')
        ->badgeColor('success');

    expect($tab->getBadgeColor())->toBe('success');
});

it('can be hidden', function () {
    $tab = Tab::make()
        ->hidden();

    expect($tab->isHidden())->toBeTrue();
});

it('can have schema', function () {
    $child = Tab::make('Child');
    $tab = Tab::make('Parent')
        ->schema([$child]);

    expect($tab->getSchema())->toHaveCount(1);
});

it('generates id from name', function () {
    $tab = Tab::make('User Settings');

    expect($tab->getId())->toBe('user-settings');
});

it('can convert to array', function () {
    $tab = Tab::make('Test')
        ->icon('<svg>...</svg>')
        ->badge('3')
        ->badgeColor('danger');

    $array = $tab->toArray();

    expect($array['type'])->toBe('Tab');
    expect($array['icon'])->toBe('<svg>...</svg>');
    expect($array['badge'])->toBe('3');
    expect($array['badgeColor'])->toBe('danger');
});
