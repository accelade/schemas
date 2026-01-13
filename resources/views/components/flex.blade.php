@props([
    'component' => null,
    'from' => 'md',
    'gap' => '4',
    'wrap' => true,
    'direction' => 'row',
    'justify' => 'start',
    'align' => 'stretch',
])

@php
    if ($component) {
        $from = $component->getFrom();
        $gap = $component->getGap();
        $wrap = $component->canWrap();
        $direction = $component->getDirection();
        $justify = $component->getJustify();
        $align = $component->getAlign();
        $schema = $component->getVisibleSchema();
        $extraAttributes = $component->getExtraAttributes();
    } else {
        $schema = [];
        $extraAttributes = [];
    }

    // Map breakpoint to Tailwind prefix
    $breakpointPrefix = match($from) {
        'sm' => 'sm:',
        'md' => 'md:',
        'lg' => 'lg:',
        'xl' => 'xl:',
        '2xl' => '2xl:',
        default => '',
    };

    // Build flex direction classes
    $directionClasses = match($direction) {
        'col' => 'flex-col',
        'row-reverse' => 'flex-row-reverse',
        'col-reverse' => 'flex-col-reverse',
        default => 'flex-row',
    };

    // Build justify classes
    $justifyClasses = match($justify) {
        'center' => 'justify-center',
        'end' => 'justify-end',
        'between' => 'justify-between',
        'around' => 'justify-around',
        'evenly' => 'justify-evenly',
        default => 'justify-start',
    };

    // Build align classes
    $alignClasses = match($align) {
        'start' => 'items-start',
        'center' => 'items-center',
        'end' => 'items-end',
        'baseline' => 'items-baseline',
        default => 'items-stretch',
    };
@endphp

<div
    {{ $attributes->merge($extraAttributes)->class([
        'flex flex-col',
        $breakpointPrefix . $directionClasses,
        $breakpointPrefix . $justifyClasses,
        $breakpointPrefix . $alignClasses,
        $wrap ? 'flex-wrap' : 'flex-nowrap',
        'gap-' . $gap,
    ]) }}
>
    @if(!empty($schema))
        @foreach($schema as $child)
            {!! $child->render() !!}
        @endforeach
    @else
        {{ $slot }}
    @endif
</div>
