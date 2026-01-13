<?php

declare(strict_types=1);

use Accelade\Schemas\Components\Text;

it('can create text with content', function () {
    $text = Text::make('Hello World');

    expect($text)->toBeInstanceOf(Text::class);
    expect($text->getContent())->toBe('Hello World');
});

it('can set content', function () {
    $text = Text::make()
        ->content('Updated content');

    expect($text->getContent())->toBe('Updated content');
});

it('has default color of neutral', function () {
    $text = Text::make('Test');

    expect($text->getColor())->toBe('neutral');
});

it('can set color', function () {
    $text = Text::make('Test')
        ->color('success');

    expect($text->getColor())->toBe('success');
});

it('is not a badge by default', function () {
    $text = Text::make('Test');

    expect($text->isBadge())->toBeFalse();
});

it('can be a badge', function () {
    $text = Text::make('Test')
        ->badge();

    expect($text->isBadge())->toBeTrue();
});

it('has default size of md', function () {
    $text = Text::make('Test');

    expect($text->getSize())->toBe('md');
});

it('can set size', function () {
    $text = Text::make('Test')
        ->size('xl');

    expect($text->getSize())->toBe('xl');
});

it('has default weight of normal', function () {
    $text = Text::make('Test');

    expect($text->getWeight())->toBe('normal');
});

it('can set weight', function () {
    $text = Text::make('Test')
        ->weight('bold');

    expect($text->getWeight())->toBe('bold');
});

it('has default font family of sans', function () {
    $text = Text::make('Test');

    expect($text->getFontFamily())->toBe('sans');
});

it('can set font family', function () {
    $text = Text::make('Test')
        ->fontFamily('mono');

    expect($text->getFontFamily())->toBe('mono');
});

it('can set tooltip', function () {
    $text = Text::make('Test')
        ->tooltip('This is a tooltip');

    expect($text->getTooltip())->toBe('This is a tooltip');
});

it('can set icon', function () {
    $text = Text::make('Test')
        ->icon('<svg>...</svg>');

    expect($text->getIcon())->toBe('<svg>...</svg>');
});

it('has default icon position of before', function () {
    $text = Text::make('Test');

    expect($text->getIconPosition())->toBe('before');
});

it('can set icon position', function () {
    $text = Text::make('Test')
        ->iconPosition('after');

    expect($text->getIconPosition())->toBe('after');
});

it('is not copyable by default', function () {
    $text = Text::make('Test');

    expect($text->isCopyable())->toBeFalse();
});

it('can be copyable', function () {
    $text = Text::make('Test')
        ->copyable();

    expect($text->isCopyable())->toBeTrue();
});

it('can convert to array', function () {
    $text = Text::make('Hello')
        ->color('primary')
        ->badge()
        ->size('lg')
        ->weight('semibold')
        ->fontFamily('serif')
        ->tooltip('Tooltip text')
        ->copyable();

    $array = $text->toArray();

    expect($array['type'])->toBe('Text');
    expect($array['content'])->toBe('Hello');
    expect($array['color'])->toBe('primary');
    expect($array['badge'])->toBeTrue();
    expect($array['size'])->toBe('lg');
    expect($array['weight'])->toBe('semibold');
    expect($array['fontFamily'])->toBe('serif');
    expect($array['tooltip'])->toBe('Tooltip text');
    expect($array['copyable'])->toBeTrue();
});
