@props([
    'component' => null,
    'columns' => 1,
    'gap' => '4',
])

@php
    if ($component) {
        $columns = $component->getColumns();
        $gap = $component->getGap();
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
            5 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-5',
            6 => 'grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6',
            default => "grid-cols-{$columns}",
        },
        is_array($columns) => collect($columns)->map(fn($cols, $bp) => $bp === 'default' ? "grid-cols-{$cols}" : "{$bp}:grid-cols-{$cols}")->implode(' '),
        default => 'grid-cols-1',
    };
@endphp

<div
    @if($id) id="{{ $id }}" @endif
    {{ $attributes->merge($extraAttributes)->class([
        'grid',
        $columnClasses,
        "gap-{$gap}",
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
