@props([
    'component' => null,
])

@php
    if ($component) {
        $schema = $component->getVisibleSchema();
        $columns = $component->getColumns();
        $extraAttributes = $component->getExtraAttributes();
    } else {
        $schema = [];
        $columns = 1;
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

<div {{ $attributes->merge($extraAttributes)->class(['grid', $columnClasses, 'gap-4']) }}>
    @if(!empty($schema))
        @foreach($schema as $child)
            {!! $child->render() !!}
        @endforeach
    @else
        {{ $slot }}
    @endif
</div>
