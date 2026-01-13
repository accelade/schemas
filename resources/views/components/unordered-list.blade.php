@props([
    'component' => null,
    'items' => [],
    'size' => 'md',
    'color' => 'neutral',
    'bulletColor' => 'neutral',
])

@php
    if ($component) {
        $items = $component->getItems();
        $size = $component->getSize();
        $color = $component->getColor();
        $bulletColor = $component->getBulletColor();
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
        default => 'text-base',
    };

    // Bullet size
    $bulletSize = match($size) {
        'xs' => 'h-1 w-1',
        'sm' => 'h-1.5 w-1.5',
        'lg' => 'h-2.5 w-2.5',
        'xl' => 'h-3 w-3',
        default => 'h-2 w-2',
    };

    // Text color style
    $textColorStyle = match($color) {
        'primary', 'indigo' => 'color: rgb(99, 102, 241);',
        'success', 'green' => 'color: rgb(34, 197, 94);',
        'warning', 'yellow' => 'color: rgb(234, 179, 8);',
        'danger', 'red' => 'color: rgb(239, 68, 68);',
        'info', 'blue' => 'color: rgb(59, 130, 246);',
        'muted', 'gray' => 'color: var(--docs-text-muted);',
        default => 'color: var(--docs-text);',
    };

    // Bullet color style
    $bulletColorStyle = match($bulletColor) {
        'primary', 'indigo' => 'background: rgb(99, 102, 241);',
        'success', 'green' => 'background: rgb(34, 197, 94);',
        'warning', 'yellow' => 'background: rgb(234, 179, 8);',
        'danger', 'red' => 'background: rgb(239, 68, 68);',
        'info', 'blue' => 'background: rgb(59, 130, 246);',
        'muted', 'gray' => 'background: var(--docs-text-muted);',
        default => 'background: var(--docs-text-muted);',
    };
@endphp

<ul
    {{ $attributes->merge($extraAttributes)->class([
        'space-y-2',
        $sizeClasses,
    ]) }}
    style="{{ $textColorStyle }}"
>
    @foreach($items as $item)
        <li class="flex items-start gap-3">
            <span
                class="{{ $bulletSize }} rounded-full flex-shrink-0 mt-2"
                style="{{ $bulletColorStyle }}"
            ></span>
            <span>
                @if($item instanceof \Accelade\Schemas\Components\Text)
                    {!! $item->render() !!}
                @else
                    {{ $item }}
                @endif
            </span>
        </li>
    @endforeach
</ul>
