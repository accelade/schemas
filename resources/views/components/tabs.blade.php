@props([
    'component' => null,
    'activeTab' => 0,
    'vertical' => false,
    'contained' => true,
    'persistInQueryString' => false,
    'queryStringKey' => 'tab',
])

@php
    if ($component) {
        $tabs = $component->getVisibleTabs();
        $activeTab = $component->getActiveTab();
        $vertical = $component->isVertical();
        $contained = $component->isContained();
        $persistInQueryString = $component->shouldPersistInQueryString();
        $queryStringKey = $component->getQueryStringKey();
        $id = $component->getId() ?? 'tabs-' . uniqid();
        $extraAttributes = $component->getExtraAttributes();
    } else {
        $tabs = [];
        $id = $attributes->get('id', 'tabs-' . uniqid());
        $extraAttributes = [];
    }

    // Determine active tab from query string if persistence is enabled
    if ($persistInQueryString && request()->has($queryStringKey)) {
        $requestedTab = request()->get($queryStringKey);
        // Find tab by ID or index
        foreach ($tabs as $index => $tab) {
            if ($tab->getId() === $requestedTab || $index === (int) $requestedTab) {
                $activeTab = $index;
                break;
            }
        }
    }

    // Get framework prefix for multi-stack support
    $framework = app('accelade')->getFramework();
    $showAttr = match($framework) {
        'vue' => 'v-show',
        'react' => 'data-state-show',
        'svelte' => 's-show',
        'angular' => 'ng-show',
        default => 'a-show',
    };
    $classAttr = match($framework) {
        'vue' => 'v-class',
        'react' => 'data-state-class',
        'svelte' => 's-class',
        'angular' => 'ng-class',
        default => 'a-class',
    };
    $textAttr = match($framework) {
        'vue' => 'v-text',
        'react' => 'data-state-text',
        'svelte' => 's-text',
        'angular' => 'ng-text',
        default => 'a-text',
    };
@endphp

<div
    id="{{ $id }}"
    {{ $attributes->merge($extraAttributes)->class([
        'rounded-xl shadow-sm ring-1 ring-[var(--docs-border)]' => $contained,
    ]) }}
    @if($contained) style="background: var(--docs-bg);" @endif
>
    @if(!empty($tabs))
        <x-accelade::data :default="['activeTab' => $activeTab]">
            <div @class([
                'flex flex-col sm:flex-row' => $vertical,
                'flex-col' => !$vertical,
            ])>
                {{-- Tab buttons --}}
                <div
                    @class([
                        'flex overflow-x-auto' => !$vertical,
                        'flex flex-row sm:flex-col sm:w-48 flex-shrink-0 overflow-x-auto' => $vertical,
                        'px-4' => $contained && !$vertical,
                    ])
                    style="border-color: var(--docs-border); {{ !$vertical ? 'border-bottom-width: 1px;' : 'border-bottom-width: 1px;' }}"
                >
                    @foreach($tabs as $index => $tab)
                        @php
                            $tabId = $tab->getId() ?? $index;
                        @endphp
                        <button
                            type="button"
                            @click="set('activeTab', {{ is_string($tabId) ? "'{$tabId}'" : $tabId }})@if($persistInQueryString); const url = new URL(window.location); url.searchParams.set('{{ $queryStringKey }}', {{ is_string($tabId) ? "'{$tabId}'" : $tabId }}); history.replaceState({}, '', url)@endif"
                            {{ $classAttr }}="{
                                'border-indigo-500': activeTab === {{ is_string($tabId) ? "'{$tabId}'" : $tabId }},
                                'text-indigo-600': activeTab === {{ is_string($tabId) ? "'{$tabId}'" : $tabId }},
                                'border-transparent': activeTab !== {{ is_string($tabId) ? "'{$tabId}'" : $tabId }}
                            }"
                            class="flex items-center gap-2 px-4 py-3 text-sm font-medium transition-colors duration-150 whitespace-nowrap {{ !$vertical ? 'border-b-2 -mb-px' : 'border-b-2 sm:border-b-0 sm:border-e-2 -mb-px sm:mb-0 sm:-me-px text-start' }}"
                            style="color: var(--docs-text);"
                        >
                            @if($tab->getIcon())
                                <span class="flex-shrink-0">{!! $tab->getIcon() !!}</span>
                            @endif

                            <span>{{ $tab->getLabel() }}</span>

                            @if($tab->getBadge())
                                <span
                                    class="ms-2 inline-flex items-center rounded-full px-2 py-0.5 text-xs font-medium"
                                    style="background: var(--docs-bg-alt); color: var(--docs-text-muted);"
                                >
                                    {{ $tab->getBadge() }}
                                </span>
                            @endif
                        </button>
                    @endforeach
                </div>

                {{-- Tab panels --}}
                <div @class(['flex-1', 'p-4' => $contained])>
                    @foreach($tabs as $index => $tab)
                        @php
                            $tabId = $tab->getId() ?? $index;
                            $tabSchema = $tab->getVisibleSchema();
                        @endphp
                        <div {{ $showAttr }}="activeTab === {{ is_string($tabId) ? "'{$tabId}'" : $tabId }}">
                            @if(!empty($tabSchema))
                                @foreach($tabSchema as $child)
                                    {!! $child->render() !!}
                                @endforeach
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </x-accelade::data>
    @else
        {{-- Slot-based tabs --}}
        {{ $slot }}
    @endif
</div>
