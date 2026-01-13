<?php

declare(strict_types=1);

use Accelade\Schemas\Components\Flex;

it('can create a flex component', function () {
    $flex = Flex::make();

    expect($flex)->toBeInstanceOf(Flex::class);
});

it('has default from breakpoint of md', function () {
    $flex = Flex::make();

    expect($flex->getFrom())->toBe('md');
});

it('can set from breakpoint', function () {
    $flex = Flex::make()
        ->from('lg');

    expect($flex->getFrom())->toBe('lg');
});

it('has default gap of 4', function () {
    $flex = Flex::make();

    expect($flex->getGap())->toBe('4');
});

it('can set gap', function () {
    $flex = Flex::make()
        ->gap('6');

    expect($flex->getGap())->toBe('6');
});

it('wraps by default', function () {
    $flex = Flex::make();

    expect($flex->canWrap())->toBeTrue();
});

it('can disable wrap', function () {
    $flex = Flex::make()
        ->wrap(false);

    expect($flex->canWrap())->toBeFalse();
});

it('can use nowrap shortcut', function () {
    $flex = Flex::make()
        ->nowrap();

    expect($flex->canWrap())->toBeFalse();
});

it('has default direction of row', function () {
    $flex = Flex::make();

    expect($flex->getDirection())->toBe('row');
});

it('can set direction', function () {
    $flex = Flex::make()
        ->direction('col');

    expect($flex->getDirection())->toBe('col');
});

it('can use column shortcut', function () {
    $flex = Flex::make()
        ->column();

    expect($flex->getDirection())->toBe('col');
});

it('can use row shortcut', function () {
    $flex = Flex::make()
        ->column()
        ->row();

    expect($flex->getDirection())->toBe('row');
});

it('has default justify of start', function () {
    $flex = Flex::make();

    expect($flex->getJustify())->toBe('start');
});

it('can set justify', function () {
    $flex = Flex::make()
        ->justify('between');

    expect($flex->getJustify())->toBe('between');
});

it('can use justify shortcuts', function () {
    expect(Flex::make()->justifyStart()->getJustify())->toBe('start');
    expect(Flex::make()->justifyCenter()->getJustify())->toBe('center');
    expect(Flex::make()->justifyEnd()->getJustify())->toBe('end');
    expect(Flex::make()->justifyBetween()->getJustify())->toBe('between');
    expect(Flex::make()->justifyAround()->getJustify())->toBe('around');
});

it('has default align of stretch', function () {
    $flex = Flex::make();

    expect($flex->getAlign())->toBe('stretch');
});

it('can set align', function () {
    $flex = Flex::make()
        ->align('center');

    expect($flex->getAlign())->toBe('center');
});

it('can use align shortcuts', function () {
    expect(Flex::make()->alignStart()->getAlign())->toBe('start');
    expect(Flex::make()->alignCenter()->getAlign())->toBe('center');
    expect(Flex::make()->alignEnd()->getAlign())->toBe('end');
});

it('can convert to array', function () {
    $flex = Flex::make()
        ->from('lg')
        ->gap('8')
        ->justifyBetween()
        ->alignCenter();

    $array = $flex->toArray();

    expect($array['type'])->toBe('Flex');
    expect($array['from'])->toBe('lg');
    expect($array['gap'])->toBe('8');
    expect($array['justify'])->toBe('between');
    expect($array['align'])->toBe('center');
});
