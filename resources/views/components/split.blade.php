@props([
    'component' => null,
    'from' => 'md',
    'leftWidth' => '1/2',
    'rightWidth' => '1/2',
    'gap' => '4',
])

@php
    if ($component) {
        $from = $component->getFrom();
        $leftWidth = $component->getLeftWidth();
        $rightWidth = $component->getRightWidth();
        $gap = $component->getGap();
        $id = $component->getId();
        $schema = $component->getVisibleSchema();
        $extraAttributes = $component->getExtraAttributes();
    } else {
        $id = $attributes->get('id');
        $schema = [];
        $extraAttributes = [];
    }

    $widthMapping = [
        '1/2' => 'w-1/2',
        '1/3' => 'w-1/3',
        '2/3' => 'w-2/3',
        '1/4' => 'w-1/4',
        '3/4' => 'w-3/4',
        '1/5' => 'w-1/5',
        '2/5' => 'w-2/5',
        '3/5' => 'w-3/5',
        '4/5' => 'w-4/5',
    ];

    $leftClass = "w-full {$from}:" . ($widthMapping[$leftWidth] ?? "w-[{$leftWidth}]");
    $rightClass = "w-full {$from}:" . ($widthMapping[$rightWidth] ?? "w-[{$rightWidth}]");
@endphp

<div
    @if($id) id="{{ $id }}" @endif
    {{ $attributes->merge($extraAttributes)->class([
        'flex flex-col',
        "{$from}:flex-row",
        "gap-{$gap}",
    ]) }}
>
    @if(!empty($schema) && count($schema) >= 2)
        <div class="{{ $leftClass }}">
            {!! $schema[0]->render() !!}
        </div>
        <div class="{{ $rightClass }}">
            {!! $schema[1]->render() !!}
        </div>
    @else
        <div class="{{ $leftClass }}">
            {{ $left ?? '' }}
        </div>
        <div class="{{ $rightClass }}">
            {{ $right ?? '' }}
        </div>
    @endif
</div>
