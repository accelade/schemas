@props([
    'component' => null,
    'heading' => null,
    'description' => null,
    'icon' => null,
    'iconColor' => 'gray',
    'iconSize' => 'lg',
    'contained' => true,
])

@php
    if ($component) {
        $heading = $component->getHeading();
        $description = $component->getDescription();
        $icon = $component->getIcon();
        $iconColor = $component->getIconColor();
        $iconSize = $component->getIconSize();
        $contained = $component->isContained();
        $schema = $component->getVisibleSchema();
        $extraAttributes = $component->getExtraAttributes();
    } else {
        $schema = [];
        $extraAttributes = [];
    }

    // Icon size classes
    $iconSizeClasses = match($iconSize) {
        'xs' => 'h-8 w-8',
        'sm' => 'h-10 w-10',
        'lg' => 'h-16 w-16',
        'xl' => 'h-20 w-20',
        default => 'h-12 w-12',
    };

    // Icon color classes
    $iconColorClasses = match($iconColor) {
        'primary', 'indigo' => 'text-indigo-400',
        'success', 'green' => 'text-green-400',
        'warning', 'yellow' => 'text-yellow-400',
        'danger', 'red' => 'text-red-400',
        'info', 'blue' => 'text-blue-400',
        default => 'text-gray-400',
    };
@endphp

<div
    {{ $attributes->merge($extraAttributes)->class([
        'flex flex-col items-center justify-center text-center py-12 px-6',
        'rounded-xl shadow-sm ring-1 ring-[var(--docs-border)]' => $contained,
    ]) }}
    @if($contained) style="background: var(--docs-bg);" @endif
>
    @if($icon)
        <div class="{{ $iconSizeClasses }} {{ $iconColorClasses }} mb-4">
            {!! $icon !!}
        </div>
    @endif

    @if($heading)
        <h3 class="text-lg font-semibold mb-2" style="color: var(--docs-text);">
            {{ $heading }}
        </h3>
    @endif

    @if($description)
        <p class="text-sm max-w-sm mb-6" style="color: var(--docs-text-muted);">
            {{ $description }}
        </p>
    @endif

    @if(!empty($schema))
        <div class="flex flex-wrap gap-3 justify-center">
            @foreach($schema as $child)
                {!! $child->render() !!}
            @endforeach
        </div>
    @else
        {{ $slot }}
    @endif
</div>
