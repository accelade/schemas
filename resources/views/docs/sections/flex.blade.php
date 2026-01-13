@props(['framework' => 'vanilla', 'prefix' => 'a', 'documentation' => null, 'hasDemo' => true])

@php
    app('accelade')->setFramework($framework);
@endphp

<x-accelade::layouts.docs :framework="$framework" section="schemas-flex" :documentation="$documentation" :hasDemo="$hasDemo">
    @include('schemas::demo.partials._flex', ['prefix' => $prefix])
</x-accelade::layouts.docs>
