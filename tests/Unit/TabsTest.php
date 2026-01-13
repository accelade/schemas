<?php

declare(strict_types=1);

use Accelade\Schemas\Components\Tab;
use Accelade\Schemas\Components\Tabs;

it('can create tabs', function () {
    $tabs = Tabs::make('main-tabs');

    expect($tabs->getName())->toBe('main-tabs');
});

it('can set tabs array', function () {
    $tab1 = Tab::make('First');
    $tab2 = Tab::make('Second');

    $tabs = Tabs::make()
        ->tabs([$tab1, $tab2]);

    expect($tabs->getTabs())->toHaveCount(2);
});

it('can set active tab by index', function () {
    $tabs = Tabs::make()
        ->activeTab(1);

    expect($tabs->getActiveTab())->toBe(1);
});

it('can persist in query string', function () {
    $tabs = Tabs::make()
        ->persistInQueryString('my-tab');

    expect($tabs->shouldPersistInQueryString())->toBeTrue();
    expect($tabs->getQueryStringKey())->toBe('my-tab');
});

it('can be vertical', function () {
    $tabs = Tabs::make()
        ->vertical();

    expect($tabs->isVertical())->toBeTrue();
});

it('can be contained', function () {
    $tabs = Tabs::make()
        ->contained(false);

    expect($tabs->isContained())->toBeFalse();
});

it('can convert to array', function () {
    $tab = Tab::make('First');
    $tabs = Tabs::make()
        ->tabs([$tab])
        ->activeTab(0)
        ->vertical();

    $array = $tabs->toArray();

    expect($array['type'])->toBe('Tabs');
    expect($array['tabs'])->toHaveCount(1);
    expect($array['activeTab'])->toBe(0);
    expect($array['vertical'])->toBeTrue();
});
