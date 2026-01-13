<?php

declare(strict_types=1);

use Accelade\Schemas\Components\Image;

it('can create image with url and alt', function () {
    $image = Image::make(url: 'https://example.com/image.jpg', alt: 'Example image');

    expect($image)->toBeInstanceOf(Image::class);
    expect($image->getUrl())->toBe('https://example.com/image.jpg');
    expect($image->getAlt())->toBe('Example image');
});

it('can set url', function () {
    $image = Image::make()
        ->url('https://example.com/new.jpg');

    expect($image->getUrl())->toBe('https://example.com/new.jpg');
});

it('can set alt', function () {
    $image = Image::make()
        ->alt('New alt text');

    expect($image->getAlt())->toBe('New alt text');
});

it('can set width', function () {
    $image = Image::make()
        ->imageWidth('300px');

    expect($image->getWidth())->toBe('300px');
});

it('can set height', function () {
    $image = Image::make()
        ->imageHeight('200px');

    expect($image->getHeight())->toBe('200px');
});

it('can set both dimensions with imageSize', function () {
    $image = Image::make()
        ->imageSize('100px');

    expect($image->getWidth())->toBe('100px');
    expect($image->getHeight())->toBe('100px');
});

it('has default alignment of start', function () {
    $image = Image::make();

    expect($image->getAlignment())->toBe('start');
});

it('can set alignment', function () {
    $image = Image::make()
        ->alignment('center');

    expect($image->getAlignment())->toBe('center');
});

it('can use alignment shortcuts', function () {
    expect(Image::make()->alignStart()->getAlignment())->toBe('start');
    expect(Image::make()->alignCenter()->getAlignment())->toBe('center');
    expect(Image::make()->alignEnd()->getAlignment())->toBe('end');
});

it('can set tooltip', function () {
    $image = Image::make()
        ->tooltip('Click to enlarge');

    expect($image->getTooltip())->toBe('Click to enlarge');
});

it('is not rounded by default', function () {
    $image = Image::make();

    expect($image->isRounded())->toBeFalse();
});

it('can be rounded', function () {
    $image = Image::make()
        ->rounded();

    expect($image->isRounded())->toBeTrue();
});

it('is not circular by default', function () {
    $image = Image::make();

    expect($image->isCircular())->toBeFalse();
});

it('can be circular', function () {
    $image = Image::make()
        ->circular();

    expect($image->isCircular())->toBeTrue();
});

it('can convert to array', function () {
    $image = Image::make(url: 'https://example.com/test.jpg', alt: 'Test')
        ->imageWidth('200px')
        ->imageHeight('100px')
        ->alignCenter()
        ->rounded()
        ->tooltip('Tooltip');

    $array = $image->toArray();

    expect($array['type'])->toBe('Image');
    expect($array['url'])->toBe('https://example.com/test.jpg');
    expect($array['alt'])->toBe('Test');
    expect($array['width'])->toBe('200px');
    expect($array['height'])->toBe('100px');
    expect($array['alignment'])->toBe('center');
    expect($array['rounded'])->toBeTrue();
    expect($array['tooltip'])->toBe('Tooltip');
});
