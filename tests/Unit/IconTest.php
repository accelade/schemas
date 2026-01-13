<?php

declare(strict_types=1);

use Accelade\Schemas\Components\Icon;

it('can create icon with svg', function () {
    $icon = Icon::make('<svg>...</svg>');

    expect($icon)->toBeInstanceOf(Icon::class);
    expect($icon->getIcon())->toBe('<svg>...</svg>');
});

it('can set icon', function () {
    $icon = Icon::make()
        ->icon('<svg>new</svg>');

    expect($icon->getIcon())->toBe('<svg>new</svg>');
});

it('has default color of neutral', function () {
    $icon = Icon::make('<svg>...</svg>');

    expect($icon->getColor())->toBe('neutral');
});

it('can set color', function () {
    $icon = Icon::make('<svg>...</svg>')
        ->color('success');

    expect($icon->getColor())->toBe('success');
});

it('has default size of md', function () {
    $icon = Icon::make('<svg>...</svg>');

    expect($icon->getSize())->toBe('md');
});

it('can set size', function () {
    $icon = Icon::make('<svg>...</svg>')
        ->size('xl');

    expect($icon->getSize())->toBe('xl');
});

it('can set tooltip', function () {
    $icon = Icon::make('<svg>...</svg>')
        ->tooltip('Click to edit');

    expect($icon->getTooltip())->toBe('Click to edit');
});

it('can convert to array', function () {
    $icon = Icon::make('<svg>test</svg>')
        ->color('primary')
        ->size('lg')
        ->tooltip('Tooltip');

    $array = $icon->toArray();

    expect($array['type'])->toBe('Icon');
    expect($array['icon'])->toBe('<svg>test</svg>');
    expect($array['color'])->toBe('primary');
    expect($array['size'])->toBe('lg');
    expect($array['tooltip'])->toBe('Tooltip');
});
