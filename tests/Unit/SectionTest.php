<?php

declare(strict_types=1);

use Accelade\Schemas\Components\Section;

it('can create a section with name', function () {
    $section = Section::make('Personal Info');

    expect($section->getName())->toBe('Personal Info');
    expect($section->getHeading())->toBe('Personal Info');
});

it('can set heading', function () {
    $section = Section::make()
        ->heading('Custom Heading');

    expect($section->getHeading())->toBe('Custom Heading');
});

it('can set description', function () {
    $section = Section::make()
        ->description('This is a description');

    expect($section->getDescription())->toBe('This is a description');
});

it('can set icon', function () {
    $section = Section::make()
        ->icon('<svg>...</svg>');

    expect($section->getIcon())->toBe('<svg>...</svg>');
});

it('can be collapsible', function () {
    $section = Section::make()
        ->collapsible();

    expect($section->isCollapsible())->toBeTrue();
    expect($section->isCollapsed())->toBeFalse();
});

it('can be collapsed by default', function () {
    $section = Section::make()
        ->collapsed();

    expect($section->isCollapsible())->toBeTrue();
    expect($section->isCollapsed())->toBeTrue();
});

it('can set columns', function () {
    $section = Section::make()
        ->columns(2);

    expect($section->getColumns())->toBe(2);
});

it('can set responsive columns', function () {
    $section = Section::make()
        ->columns(['default' => 1, 'sm' => 2, 'lg' => 3]);

    expect($section->getColumns())->toBe(['default' => 1, 'sm' => 2, 'lg' => 3]);
});

it('can be aside', function () {
    $section = Section::make()
        ->aside();

    expect($section->isAside())->toBeTrue();
});

it('can be compact', function () {
    $section = Section::make()
        ->compact();

    expect($section->isCompact())->toBeTrue();
});

it('can be hidden', function () {
    $section = Section::make()
        ->hidden();

    expect($section->isHidden())->toBeTrue();
});

it('can have child schema', function () {
    $child = Section::make('Child');
    $section = Section::make('Parent')
        ->schema([$child]);

    expect($section->getSchema())->toHaveCount(1);
    expect($section->getSchema()[0])->toBe($child);
});

it('can convert to array', function () {
    $section = Section::make('Test')
        ->heading('Test Heading')
        ->description('Test description')
        ->collapsible()
        ->columns(2);

    $array = $section->toArray();

    expect($array['type'])->toBe('Section');
    expect($array['heading'])->toBe('Test Heading');
    expect($array['description'])->toBe('Test description');
    expect($array['collapsible'])->toBeTrue();
    expect($array['columns'])->toBe(2);
});
