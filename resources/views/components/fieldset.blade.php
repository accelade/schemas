@props([
    'component' => null,
    'legend' => null,
    'columns' => 1,
])

@php
    if ($component) {
        $legend = $component->getLegend();
        $columns = $component->getColumns();
        $id = $component->getId();
        $schema = $component->getVisibleSchema();
        $extraAttributes = $component->getExtraAttributes();
    } else {
        $id = $attributes->get('id');
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
@endphp

<fieldset
    @if($id) id="{{ $id }}" @endif
    {{ $attributes->merge($extraAttributes)->class([
        'rounded-xl border p-4',
    ]) }}
    style="border-color: var(--docs-border);"
>
    @if($legend)
        <legend class="px-2 text-sm font-medium" style="color: var(--docs-text);">
            {{ $legend }}
        </legend>
    @endif

    <div class="grid {{ $columnClasses }} gap-4">
        @if(!empty($schema))
            @foreach($schema as $child)
                {!! $child->render() !!}
            @endforeach
        @else
            {{ $slot }}
        @endif
    </div>
</fieldset>
