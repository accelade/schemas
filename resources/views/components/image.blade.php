@props([
    'component' => null,
    'url' => null,
    'alt' => '',
    'width' => null,
    'height' => null,
    'alignment' => 'start',
    'tooltip' => null,
    'rounded' => false,
    'circular' => false,
])

@php
    if ($component) {
        $url = $component->getUrl();
        $alt = $component->getAlt() ?? '';
        $width = $component->getWidth();
        $height = $component->getHeight();
        $alignment = $component->getAlignment();
        $tooltip = $component->getTooltip();
        $rounded = $component->isRounded();
        $circular = $component->isCircular();
        $extraAttributes = $component->getExtraAttributes();
    } else {
        $extraAttributes = [];
    }

    // Alignment classes for wrapper
    $alignClasses = match($alignment) {
        'center' => 'flex justify-center',
        'end' => 'flex justify-end',
        default => 'flex justify-start',
    };

    // Build inline style for dimensions
    $styleItems = [];
    if ($width) {
        $styleItems[] = "width: {$width}";
    }
    if ($height) {
        $styleItems[] = "height: {$height}";
    }
    $imageStyle = implode('; ', $styleItems);
@endphp

<div class="{{ $alignClasses }}">
    <img
        {{ $attributes->merge($extraAttributes)->class([
            'max-w-full',
            'rounded-lg' => $rounded && !$circular,
            'rounded-full' => $circular,
        ]) }}
        src="{{ $url }}"
        alt="{{ $alt }}"
        @if($imageStyle) style="{{ $imageStyle }}" @endif
        @if($tooltip) title="{{ $tooltip }}" @endif
    />
</div>
