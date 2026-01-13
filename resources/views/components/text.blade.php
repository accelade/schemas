@props([
    'component' => null,
    'content' => null,
    'color' => 'neutral',
    'badge' => false,
    'size' => 'md',
    'weight' => 'normal',
    'fontFamily' => 'sans',
    'tooltip' => null,
    'icon' => null,
    'iconPosition' => 'before',
    'copyable' => false,
])

@php
    if ($component) {
        $content = $component->getContent();
        $color = $component->getColor();
        $badge = $component->isBadge();
        $size = $component->getSize();
        $weight = $component->getWeight();
        $fontFamily = $component->getFontFamily();
        $tooltip = $component->getTooltip();
        $icon = $component->getIcon();
        $iconPosition = $component->getIconPosition();
        $copyable = $component->isCopyable();
        $extraAttributes = $component->getExtraAttributes();
    } else {
        $extraAttributes = [];
    }

    // Size classes
    $sizeClasses = match($size) {
        'xs' => 'text-xs',
        'sm' => 'text-sm',
        'lg' => 'text-lg',
        'xl' => 'text-xl',
        '2xl' => 'text-2xl',
        default => 'text-base',
    };

    // Weight classes
    $weightClasses = match($weight) {
        'thin' => 'font-thin',
        'extralight' => 'font-extralight',
        'light' => 'font-light',
        'medium' => 'font-medium',
        'semibold' => 'font-semibold',
        'bold' => 'font-bold',
        'extrabold' => 'font-extrabold',
        'black' => 'font-black',
        default => 'font-normal',
    };

    // Font family classes
    $fontClasses = match($fontFamily) {
        'serif' => 'font-serif',
        'mono' => 'font-mono',
        default => 'font-sans',
    };

    // Color classes for text
    $textColorStyle = match($color) {
        'primary', 'indigo' => 'color: rgb(99, 102, 241);',
        'success', 'green' => 'color: rgb(34, 197, 94);',
        'warning', 'yellow' => 'color: rgb(234, 179, 8);',
        'danger', 'red' => 'color: rgb(239, 68, 68);',
        'info', 'blue' => 'color: rgb(59, 130, 246);',
        'muted', 'gray' => 'color: var(--docs-text-muted);',
        default => 'color: var(--docs-text);',
    };

    // Badge color classes
    $badgeBgStyle = match($color) {
        'primary', 'indigo' => 'background: rgb(238, 242, 255); color: rgb(79, 70, 229);',
        'success', 'green' => 'background: rgb(220, 252, 231); color: rgb(22, 163, 74);',
        'warning', 'yellow' => 'background: rgb(254, 249, 195); color: rgb(161, 98, 7);',
        'danger', 'red' => 'background: rgb(254, 226, 226); color: rgb(185, 28, 28);',
        'info', 'blue' => 'background: rgb(219, 234, 254); color: rgb(29, 78, 216);',
        default => 'background: var(--docs-bg-alt); color: var(--docs-text);',
    };

    // Icon size
    $iconSizeClasses = match($size) {
        'xs' => 'h-3 w-3',
        'sm' => 'h-3.5 w-3.5',
        'lg' => 'h-5 w-5',
        'xl' => 'h-6 w-6',
        default => 'h-4 w-4',
    };
@endphp

@if($badge)
    <span
        {{ $attributes->merge($extraAttributes)->class([
            'inline-flex items-center gap-1.5 rounded-full px-2.5 py-0.5',
            $sizeClasses,
            $weightClasses,
            $fontClasses,
        ]) }}
        style="{{ $badgeBgStyle }}"
        @if($tooltip) title="{{ $tooltip }}" @endif
    >
        @if($icon && $iconPosition === 'before')
            <span class="{{ $iconSizeClasses }} flex-shrink-0">{!! $icon !!}</span>
        @endif

        <span>{{ $content ?? $slot }}</span>

        @if($icon && $iconPosition === 'after')
            <span class="{{ $iconSizeClasses }} flex-shrink-0">{!! $icon !!}</span>
        @endif

        @if($copyable)
            <button
                type="button"
                @click="navigator.clipboard.writeText('{{ addslashes($content ?? '') }}')"
                class="ml-1 opacity-60 hover:opacity-100 transition-opacity"
            >
                <svg class="{{ $iconSizeClasses }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                </svg>
            </button>
        @endif
    </span>
@else
    <span
        {{ $attributes->merge($extraAttributes)->class([
            'inline',
            $sizeClasses,
            $weightClasses,
            $fontClasses,
        ]) }}
        style="{{ $textColorStyle }}"
        @if($tooltip) title="{{ $tooltip }}" @endif
    >
        @if($icon && $iconPosition === 'before')
            <span class="{{ $iconSizeClasses }} inline-flex align-middle mr-1">{!! $icon !!}</span>
        @endif

        {{ $content ?? $slot }}

        @if($icon && $iconPosition === 'after')
            <span class="{{ $iconSizeClasses }} inline-flex align-middle ml-1">{!! $icon !!}</span>
        @endif

        @if($copyable)
            <button
                type="button"
                @click="navigator.clipboard.writeText('{{ addslashes($content ?? '') }}')"
                class="ml-1 opacity-60 hover:opacity-100 transition-opacity inline-flex align-middle"
            >
                <svg class="{{ $iconSizeClasses }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                </svg>
            </button>
        @endif
    </span>
@endif
