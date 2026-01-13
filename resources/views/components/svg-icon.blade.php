@props([
    'component' => null,
    'icon' => null,
    'color' => 'neutral',
    'size' => 'md',
    'tooltip' => null,
])

@php
    if ($component) {
        $icon = $component->getIcon();
        $color = $component->getColor();
        $size = $component->getSize();
        $tooltip = $component->getTooltip();
        $extraAttributes = $component->getExtraAttributes();
    } else {
        $extraAttributes = [];
    }

    // Size classes
    $sizeClasses = match($size) {
        'xs' => 'h-4 w-4',
        'sm' => 'h-5 w-5',
        'lg' => 'h-8 w-8',
        'xl' => 'h-10 w-10',
        '2xl' => 'h-12 w-12',
        default => 'h-6 w-6',
    };

    // Color style
    $colorStyle = match($color) {
        'primary', 'indigo' => 'color: rgb(99, 102, 241);',
        'success', 'green' => 'color: rgb(34, 197, 94);',
        'warning', 'yellow' => 'color: rgb(234, 179, 8);',
        'danger', 'red' => 'color: rgb(239, 68, 68);',
        'info', 'blue' => 'color: rgb(59, 130, 246);',
        'muted', 'gray' => 'color: var(--docs-text-muted);',
        default => 'color: var(--docs-text);',
    };
@endphp

<span
    {{ $attributes->merge($extraAttributes)->class([
        'inline-flex items-center justify-center flex-shrink-0',
        $sizeClasses,
    ]) }}
    style="{{ $colorStyle }}"
    @if($tooltip) title="{{ $tooltip }}" @endif
>
    @if($icon)
        {!! $icon !!}
    @else
        {{ $slot }}
    @endif
</span>
