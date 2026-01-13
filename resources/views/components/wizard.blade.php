@props([
    'component' => null,
    'startStep' => 0,
    'skippable' => false,
    'nextLabel' => 'Next',
    'previousLabel' => 'Previous',
    'submitLabel' => 'Submit',
])

@php
    if ($component) {
        $steps = $component->getVisibleSteps();
        $startStep = $component->getStartStep();
        $skippable = $component->isSkippable();
        $nextLabel = $component->getNextLabel();
        $previousLabel = $component->getPreviousLabel();
        $submitLabel = $component->getSubmitLabel();
        $id = $component->getId() ?? 'wizard-' . uniqid();
        $extraAttributes = $component->getExtraAttributes();
    } else {
        $steps = [];
        $id = $attributes->get('id', 'wizard-' . uniqid());
        $extraAttributes = [];
    }

    $totalSteps = count($steps);

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
@endphp

<x-accelade::data :default="[
    'currentStep' => $startStep,
    'totalSteps' => $totalSteps,
    'skippable' => $skippable,
]">
    <div
        id="{{ $id }}"
        {{ $attributes->merge($extraAttributes)->class([
            'rounded-xl shadow-sm ring-1 ring-[var(--docs-border)]',
        ]) }}
        style="background: var(--docs-bg);"
    >
        {{-- Step indicators --}}
        <div style="border-bottom: 1px solid var(--docs-border);">
            <nav class="flex justify-center overflow-x-auto" aria-label="Progress">
                <ol class="flex items-center gap-2 sm:gap-5 px-4 sm:px-6 py-4">
                    @foreach($steps as $index => $step)
                        <li>
                            <button
                                type="button"
                                @click="if (skippable || {{ $index }} <= currentStep) { set('currentStep', {{ $index }}) }"
                                class="flex items-center"
                                {{ $classAttr }}="{
                                    'cursor-pointer': skippable || {{ $index }} <= currentStep,
                                    'cursor-not-allowed': !skippable && {{ $index }} > currentStep
                                }"
                            >
                                {{-- Step circle --}}
                                <span
                                    class="flex h-8 w-8 items-center justify-center rounded-full transition-colors duration-200"
                                    {{ $classAttr }}="{
                                        'bg-indigo-600': currentStep >= {{ $index }}
                                    }"
                                    style="background: var(--docs-bg-alt);"
                                >
                                    @if($step->getIcon())
                                        <span class="text-white text-sm">{!! $step->getIcon() !!}</span>
                                    @else
                                        <span
                                            class="text-sm font-medium"
                                            {{ $classAttr }}="{
                                                'text-white': currentStep >= {{ $index }}
                                            }"
                                            style="color: var(--docs-text-muted);"
                                        >
                                            {{ $index + 1 }}
                                        </span>
                                    @endif
                                </span>

                                {{-- Step label --}}
                                <span class="ms-2 sm:ms-3 text-sm font-medium hidden sm:inline">
                                    <span
                                        {{ $classAttr }}="{
                                            'text-indigo-600': currentStep === {{ $index }}
                                        }"
                                        style="color: var(--docs-text);"
                                    >
                                        {{ $step->getLabel() }}
                                    </span>
                                    @if($step->getDescription())
                                        <span class="block text-xs" style="color: var(--docs-text-muted);">
                                            {{ $step->getDescription() }}
                                        </span>
                                    @endif
                                </span>
                            </button>
                        </li>

                        @if(!$loop->last)
                            {{-- Connector line --}}
                            <li class="hidden md:block">
                                <div
                                    class="h-0.5 w-12 transition-colors duration-200"
                                    {{ $classAttr }}="{
                                        'bg-indigo-600': currentStep > {{ $index }}
                                    }"
                                    style="background: var(--docs-border);"
                                ></div>
                            </li>
                        @endif
                    @endforeach
                </ol>
            </nav>
        </div>

        {{-- Step content --}}
        <div class="p-6">
            @foreach($steps as $index => $step)
                @php
                    $stepSchema = $step->getVisibleSchema();
                    $columns = $step->getColumns();
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
                <div {{ $showAttr }}="currentStep === {{ $index }}">
                    <div class="grid {{ $columnClasses }} gap-4">
                        @if(!empty($stepSchema))
                            @foreach($stepSchema as $child)
                                {!! $child->render() !!}
                            @endforeach
                        @endif
                    </div>
                </div>
            @endforeach

            {{-- Slot-based content --}}
            @if(empty($steps))
                {{ $slot }}
            @endif
        </div>

        {{-- Navigation buttons --}}
        <div class="flex items-center justify-between px-6 py-4" style="border-top: 1px solid var(--docs-border);">
            <button
                type="button"
                {{ $showAttr }}="currentStep > 0"
                @click="set('currentStep', currentStep - 1)"
                class="inline-flex items-center gap-2 rounded-lg border px-4 py-2 text-sm font-medium shadow-sm hover:opacity-80 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                style="border-color: var(--docs-border); background: var(--docs-bg); color: var(--docs-text);"
            >
                <svg class="h-4 w-4 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
                {{ $previousLabel }}
            </button>

            <div {{ $showAttr }}="currentStep === 0"></div>

            <button
                type="button"
                {{ $showAttr }}="currentStep < totalSteps - 1"
                @click="set('currentStep', currentStep + 1)"
                class="inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            >
                {{ $nextLabel }}
                <svg class="h-4 w-4 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </button>

            <button
                type="submit"
                {{ $showAttr }}="currentStep === totalSteps - 1"
                class="inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            >
                {{ $submitLabel }}
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
            </button>
        </div>
    </div>
</x-accelade::data>
