@props(['framework' => 'vanilla', 'prefix' => 'a', 'documentation' => null, 'hasDemo' => true])

@php
    app('accelade')->setFramework($framework);
@endphp

<x-accelade::layouts.docs :framework="$framework" section="schemas-custom-components" :documentation="$documentation" :hasDemo="$hasDemo">
    @include('schemas::demo.partials._custom-components', ['prefix' => $prefix])
</x-accelade::layouts.docs>
