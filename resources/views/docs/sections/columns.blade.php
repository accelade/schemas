@props(['framework' => 'vanilla', 'prefix' => 'a', 'documentation' => null, 'hasDemo' => true])

@php
    app('accelade')->setFramework($framework);
@endphp

<x-accelade::layouts.docs :framework="$framework" section="schemas-columns" :documentation="$documentation" :hasDemo="$hasDemo">
    @include('schemas::demo.partials._columns', ['prefix' => $prefix])
</x-accelade::layouts.docs>
