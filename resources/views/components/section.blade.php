@props([
    'component' => null,
    'heading' => null,
    'description' => null,
    'icon' => null,
    'collapsible' => false,
    'collapsed' => false,
    'columns' => 1,
    'aside' => false,
    'compact' => false,
])

@php
    // Support both object-based and attribute-based usage
    if ($component) {
        $heading = $component->getHeading();
        $description = $component->getDescription();
        $icon = $component->getIcon();
        $collapsible = $component->isCollapsible();
        $collapsed = $component->isCollapsed();
        $columns = $component->getColumns();
        $aside = $component->isAside();
        $compact = $component->isCompact();
        $id = $component->getId() ?? 'section-' . uniqid();
        $schema = $component->getVisibleSchema();
        $extraAttributes = $component->getExtraAttributes();
    } else {
        $id = $attributes->get('id', 'section-' . uniqid());
        $schema = [];
        $extraAttributes = [];
    }

    $columnClasses = match(true) {
        is_int($columns) => match ($columns) {
            1 => 'grid-cols-1',
            2 => 'grid-cols-1 sm:grid-cols-2',
            3 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
            4 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4',
            default => "grid-cols-{$columns}",
        },
        is_array($columns) => collect($columns)->map(fn($cols, $bp) => $bp === 'default' ? "grid-cols-{$cols}" : "{$bp}:grid-cols-{$cols}")->implode(' '),
        default => 'grid-cols-1',
    };

    // Get framework prefix for multi-stack support
    $framework = app('accelade')->getFramework();
    $showAttr = match($framework) {
        'vue' => 'v-show',
        'react' => 'data-state-show',
        'svelte' => 's-show',
        'angular' => 'ng-show',
        default => 'a-show',
    };
    $textAttr = match($framework) {
        'vue' => 'v-text',
        'react' => 'data-state-text',
        'svelte' => 's-text',
        'angular' => 'ng-text',
        default => 'a-text',
    };
@endphp

@if($collapsible)
<x-accelade::toggle :data="!$collapsed" animation="collapse">
    <div
        id="{{ $id }}"
        {{ $attributes->merge($extraAttributes)->class([
            'rounded-xl shadow-sm ring-1 ring-[var(--docs-border)]',
            'p-4' => $compact,
            'p-6' => !$compact,
        ]) }}
        style="background: var(--docs-bg);"
    >
        {{-- Header --}}
        @if($heading || $description || $icon)
            <div class="flex items-start gap-3 cursor-pointer" @click="toggle()">
                @if($icon)
                    <div class="flex-shrink-0" style="color: var(--docs-text-muted);">
                        {!! $icon !!}
                    </div>
                @endif

                <div class="flex-1 min-w-0 text-start">
                    @if($heading)
                        <h3 class="text-base font-semibold leading-6" style="color: var(--docs-text);">
                            {{ $heading }}
                        </h3>
                    @endif

                    @if($description)
                        <p class="mt-1 text-sm" style="color: var(--docs-text-muted);">
                            {{ $description }}
                        </p>
                    @endif
                </div>

                <button type="button" class="flex-shrink-0 hover:opacity-75" style="color: var(--docs-text-muted);">
                    <svg class="size-5 transition-transform duration-200" {{ $showAttr }}="!toggled" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                    <svg class="size-5 transition-transform duration-200" {{ $showAttr }}="toggled" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                    </svg>
                </button>
            </div>
        @endif

        {{-- Content --}}
        <div {{ $showAttr }}="toggled" @class(['mt-4' => $heading || $description || $icon])>
            @if($aside)
                <div class="flex flex-col md:flex-row gap-6">
                    <div class="md:w-1/3 text-start">
                        {{ $header ?? '' }}
                    </div>
                    <div class="md:w-2/3 grid {{ $columnClasses }} gap-4">
                        @if(!empty($schema))
                            @foreach($schema as $child)
                                @php
                                    $childColumnSpan = method_exists($child, 'getColumnSpan') ? $child->getColumnSpan() : null;
                                    $childColumnStart = method_exists($child, 'getColumnStart') ? $child->getColumnStart() : null;
                                    $childSpanClass = match ($childColumnSpan) {
                                        'full' => 'col-span-full',
                                        2 => 'sm:col-span-2',
                                        3 => 'lg:col-span-3',
                                        4 => 'lg:col-span-4',
                                        default => null,
                                    };
                                    $childStartClass = $childColumnStart ? "col-start-{$childColumnStart}" : null;
                                @endphp
                                <div @class(['accelade-grid-item', $childSpanClass, $childStartClass])>
                                    {!! $child->render() !!}
                                </div>
                            @endforeach
                        @else
                            {{ $slot }}
                        @endif
                    </div>
                </div>
            @else
                <div class="grid {{ $columnClasses }} gap-4">
                    @if(!empty($schema))
                        @foreach($schema as $child)
                            @php
                                $childColumnSpan = method_exists($child, 'getColumnSpan') ? $child->getColumnSpan() : null;
                                $childColumnStart = method_exists($child, 'getColumnStart') ? $child->getColumnStart() : null;
                                $childSpanClass = match ($childColumnSpan) {
                                    'full' => 'col-span-full',
                                    2 => 'sm:col-span-2',
                                    3 => 'lg:col-span-3',
                                    4 => 'lg:col-span-4',
                                    default => null,
                                };
                                $childStartClass = $childColumnStart ? "col-start-{$childColumnStart}" : null;
                            @endphp
                            <div @class(['accelade-grid-item', $childSpanClass, $childStartClass])>
                                {!! $child->render() !!}
                            </div>
                        @endforeach
                    @else
                        {{ $slot }}
                    @endif
                </div>
            @endif
        </div>
    </div>
</x-accelade::toggle>
@else
<div
    id="{{ $id }}"
    {{ $attributes->merge($extraAttributes)->class([
        'rounded-xl shadow-sm ring-1 ring-[var(--docs-border)]',
        'p-4' => $compact,
        'p-6' => !$compact,
    ]) }}
    style="background: var(--docs-bg);"
>
    {{-- Header --}}
    @if($heading || $description || $icon)
        <div class="flex items-start gap-3">
            @if($icon)
                <div class="flex-shrink-0" style="color: var(--docs-text-muted);">
                    {!! $icon !!}
                </div>
            @endif

            <div class="flex-1 min-w-0 text-start">
                @if($heading)
                    <h3 class="text-base font-semibold leading-6" style="color: var(--docs-text);">
                        {{ $heading }}
                    </h3>
                @endif

                @if($description)
                    <p class="mt-1 text-sm" style="color: var(--docs-text-muted);">
                        {{ $description }}
                    </p>
                @endif
            </div>
        </div>
    @endif

    {{-- Content --}}
    <div @class(['mt-4' => $heading || $description || $icon])>
        @if($aside)
            <div class="flex flex-col md:flex-row gap-6">
                <div class="md:w-1/3 text-start">
                    {{ $header ?? '' }}
                </div>
                <div class="md:w-2/3 grid {{ $columnClasses }} gap-4">
                    @if(!empty($schema))
                        @foreach($schema as $child)
                            @php
                                $childColumnSpan = method_exists($child, 'getColumnSpan') ? $child->getColumnSpan() : null;
                                $childColumnStart = method_exists($child, 'getColumnStart') ? $child->getColumnStart() : null;
                                $childSpanClass = match ($childColumnSpan) {
                                    'full' => 'col-span-full',
                                    2 => 'sm:col-span-2',
                                    3 => 'lg:col-span-3',
                                    4 => 'lg:col-span-4',
                                    default => null,
                                };
                                $childStartClass = $childColumnStart ? "col-start-{$childColumnStart}" : null;
                            @endphp
                            <div @class(['accelade-grid-item', $childSpanClass, $childStartClass])>
                                {!! $child->render() !!}
                            </div>
                        @endforeach
                    @else
                        {{ $slot }}
                    @endif
                </div>
            </div>
        @else
            <div class="grid {{ $columnClasses }} gap-4">
                @if(!empty($schema))
                    @foreach($schema as $child)
                        @php
                            $childColumnSpan = method_exists($child, 'getColumnSpan') ? $child->getColumnSpan() : null;
                            $childColumnStart = method_exists($child, 'getColumnStart') ? $child->getColumnStart() : null;
                            $childSpanClass = match ($childColumnSpan) {
                                'full' => 'col-span-full',
                                2 => 'sm:col-span-2',
                                3 => 'lg:col-span-3',
                                4 => 'lg:col-span-4',
                                default => null,
                            };
                            $childStartClass = $childColumnStart ? "col-start-{$childColumnStart}" : null;
                        @endphp
                        <div @class(['accelade-grid-item', $childSpanClass, $childStartClass])>
                            {!! $child->render() !!}
                        </div>
                    @endforeach
                @else
                    {{ $slot }}
                @endif
            </div>
        @endif
    </div>
</div>
@endif
