@props([
    'component' => null,
])

@php
    if ($component) {
        $schema = $component->getVisibleSchema();
        $extraAttributes = $component->getExtraAttributes();
    } else {
        $schema = [];
        $extraAttributes = [];
    }
@endphp

<div {{ $attributes->merge($extraAttributes) }}>
    @if(!empty($schema))
        @foreach($schema as $child)
            {!! $child->render() !!}
        @endforeach
    @else
        {{ $slot }}
    @endif
</div>
