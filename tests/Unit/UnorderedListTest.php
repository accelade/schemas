<?php

declare(strict_types=1);

use Accelade\Schemas\Components\Text;
use Accelade\Schemas\Components\UnorderedList;

it('can create unordered list', function () {
    $list = UnorderedList::make();

    expect($list)->toBeInstanceOf(UnorderedList::class);
});

it('can create unordered list with items using fromItems', function () {
    $list = UnorderedList::fromItems(['Item 1', 'Item 2', 'Item 3']);

    expect($list)->toBeInstanceOf(UnorderedList::class);
    expect($list->getItems())->toBe(['Item 1', 'Item 2', 'Item 3']);
});

it('can set items', function () {
    $list = UnorderedList::make()
        ->items(['New 1', 'New 2']);

    expect($list->getItems())->toBe(['New 1', 'New 2']);
});

it('has default size of md', function () {
    $list = UnorderedList::make();

    expect($list->getSize())->toBe('md');
});

it('can set size', function () {
    $list = UnorderedList::make()
        ->size('lg');

    expect($list->getSize())->toBe('lg');
});

it('has default color of neutral', function () {
    $list = UnorderedList::make();

    expect($list->getColor())->toBe('neutral');
});

it('can set color', function () {
    $list = UnorderedList::make()
        ->color('muted');

    expect($list->getColor())->toBe('muted');
});

it('has default bullet color of neutral', function () {
    $list = UnorderedList::make();

    expect($list->getBulletColor())->toBe('neutral');
});

it('can set bullet color', function () {
    $list = UnorderedList::make()
        ->bulletColor('success');

    expect($list->getBulletColor())->toBe('success');
});

it('can contain Text components', function () {
    $textItem = Text::make('Styled item')->color('primary');
    $list = UnorderedList::make()
        ->items([
            'Plain item',
            $textItem,
        ]);

    $items = $list->getItems();

    expect($items)->toHaveCount(2);
    expect($items[0])->toBe('Plain item');
    expect($items[1])->toBeInstanceOf(Text::class);
});

it('can convert to array', function () {
    $list = UnorderedList::make()
        ->items(['Item 1', 'Item 2'])
        ->size('lg')
        ->color('muted')
        ->bulletColor('primary');

    $array = $list->toArray();

    expect($array['type'])->toBe('UnorderedList');
    expect($array['items'])->toBe(['Item 1', 'Item 2']);
    expect($array['size'])->toBe('lg');
    expect($array['color'])->toBe('muted');
    expect($array['bulletColor'])->toBe('primary');
});

it('converts Text items to array', function () {
    $textItem = Text::make('Styled')->color('success');
    $list = UnorderedList::make()
        ->items(['Plain', $textItem]);

    $array = $list->toArray();

    expect($array['items'][0])->toBe('Plain');
    expect($array['items'][1])->toBeArray();
    expect($array['items'][1]['content'])->toBe('Styled');
    expect($array['items'][1]['color'])->toBe('success');
});
