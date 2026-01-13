{{-- Icon Component Demo --}}
@props(['prefix' => 'a'])

@php
    $homeIcon = '<svg class="w-full h-full" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>';
    $userIcon = '<svg class="w-full h-full" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>';
    $settingsIcon = '<svg class="w-full h-full" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>';
    $mailIcon = '<svg class="w-full h-full" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>';
    $bellIcon = '<svg class="w-full h-full" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>';
    $checkIcon = '<svg class="w-full h-full" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>';
    $xIcon = '<svg class="w-full h-full" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>';
    $warningIcon = '<svg class="w-full h-full" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>';
@endphp

<!-- Demo: Icon Component -->
<section class="rounded-xl p-6 mb-6 border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
    <div class="flex items-center gap-3 mb-2">
        <span class="w-2.5 h-2.5 bg-indigo-500 rounded-full"></span>
        <h3 class="text-lg font-semibold" style="color: var(--docs-text);">Icon Component</h3>
    </div>
    <p class="text-sm mb-6" style="color: var(--docs-text-muted);">
        Display SVG icons with colors, sizes, and tooltips using
        <code class="px-1.5 py-0.5 rounded text-sm border border-[var(--docs-border)]" style="background: var(--docs-bg);">&lt;x-accelade::svg-icon&gt;</code>.
    </p>

    <div class="space-y-6 mb-6">
        <!-- Basic Icons -->
        <div class="rounded-xl p-4 border border-indigo-500/30" style="background: rgba(99, 102, 241, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-indigo-500/20 text-indigo-500 rounded">Basic</span>
                Default Icons
            </h4>

            <div class="flex items-center gap-4">
                <x-accelade::svg-icon :icon="$homeIcon" />
                <x-accelade::svg-icon :icon="$userIcon" />
                <x-accelade::svg-icon :icon="$settingsIcon" />
                <x-accelade::svg-icon :icon="$mailIcon" />
                <x-accelade::svg-icon :icon="$bellIcon" />
            </div>
        </div>

        <!-- Icon Colors -->
        <div class="rounded-xl p-4 border border-emerald-500/30" style="background: rgba(16, 185, 129, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-emerald-500/20 text-emerald-500 rounded">Colors</span>
                Color Variations
            </h4>

            <div class="flex items-center gap-4">
                <x-accelade::svg-icon :icon="$checkIcon" color="neutral" tooltip="Neutral" />
                <x-accelade::svg-icon :icon="$checkIcon" color="primary" tooltip="Primary" />
                <x-accelade::svg-icon :icon="$checkIcon" color="success" tooltip="Success" />
                <x-accelade::svg-icon :icon="$warningIcon" color="warning" tooltip="Warning" />
                <x-accelade::svg-icon :icon="$xIcon" color="danger" tooltip="Danger" />
                <x-accelade::svg-icon :icon="$bellIcon" color="info" tooltip="Info" />
            </div>
        </div>

        <!-- Icon Sizes -->
        <div class="rounded-xl p-4 border border-amber-500/30" style="background: rgba(245, 158, 11, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-amber-500/20 text-amber-500 rounded">Sizes</span>
                Size Variations
            </h4>

            <div class="flex items-end gap-4">
                <div class="text-center">
                    <x-accelade::svg-icon :icon="$userIcon" size="xs" color="primary" />
                    <p class="text-xs mt-1" style="color: var(--docs-text-muted);">xs</p>
                </div>
                <div class="text-center">
                    <x-accelade::svg-icon :icon="$userIcon" size="sm" color="primary" />
                    <p class="text-xs mt-1" style="color: var(--docs-text-muted);">sm</p>
                </div>
                <div class="text-center">
                    <x-accelade::svg-icon :icon="$userIcon" size="md" color="primary" />
                    <p class="text-xs mt-1" style="color: var(--docs-text-muted);">md</p>
                </div>
                <div class="text-center">
                    <x-accelade::svg-icon :icon="$userIcon" size="lg" color="primary" />
                    <p class="text-xs mt-1" style="color: var(--docs-text-muted);">lg</p>
                </div>
                <div class="text-center">
                    <x-accelade::svg-icon :icon="$userIcon" size="xl" color="primary" />
                    <p class="text-xs mt-1" style="color: var(--docs-text-muted);">xl</p>
                </div>
                <div class="text-center">
                    <x-accelade::svg-icon :icon="$userIcon" size="2xl" color="primary" />
                    <p class="text-xs mt-1" style="color: var(--docs-text-muted);">2xl</p>
                </div>
            </div>
        </div>

        <!-- Icons in Context -->
        <div class="rounded-xl p-4 border border-purple-500/30" style="background: rgba(168, 85, 247, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-purple-500/20 text-purple-500 rounded">Context</span>
                Icons in Context
            </h4>

            <div class="space-y-3">
                <div class="flex items-center gap-2 p-3 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <x-accelade::svg-icon :icon="$checkIcon" color="success" size="sm" />
                    <span style="color: var(--docs-text);">Task completed successfully</span>
                </div>
                <div class="flex items-center gap-2 p-3 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <x-accelade::svg-icon :icon="$warningIcon" color="warning" size="sm" />
                    <span style="color: var(--docs-text);">Please review before continuing</span>
                </div>
                <div class="flex items-center gap-2 p-3 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <x-accelade::svg-icon :icon="$xIcon" color="danger" size="sm" />
                    <span style="color: var(--docs-text);">Action failed, please try again</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Props Table -->
    <div class="rounded-xl p-4 border border-[var(--docs-border)] mb-4" style="background: var(--docs-bg);">
        <h4 class="font-medium mb-4" style="color: var(--docs-text);">Component Props</h4>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-[var(--docs-border)]">
                        <th class="text-start py-2 px-3" style="color: var(--docs-text-muted);">Prop</th>
                        <th class="text-start py-2 px-3" style="color: var(--docs-text-muted);">Type</th>
                        <th class="text-start py-2 px-3" style="color: var(--docs-text-muted);">Default</th>
                        <th class="text-start py-2 px-3" style="color: var(--docs-text-muted);">Description</th>
                    </tr>
                </thead>
                <tbody style="color: var(--docs-text-muted);">
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">icon</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">null</td>
                        <td class="py-2 px-3">SVG icon markup</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">color</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">'neutral'</td>
                        <td class="py-2 px-3">Icon color (neutral, primary, success, warning, danger, info, muted)</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">size</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">'md'</td>
                        <td class="py-2 px-3">Icon size (xs, sm, md, lg, xl, 2xl)</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-3"><code class="text-indigo-500">tooltip</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">null</td>
                        <td class="py-2 px-3">Tooltip text on hover</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <x-accelade::code-block language="blade" filename="icon-examples.blade.php">
{{-- Basic icon --}}
&lt;x-accelade::svg-icon :icon="$homeIcon" /&gt;

{{-- With color --}}
&lt;x-accelade::svg-icon :icon="$checkIcon" color="success" /&gt;

{{-- With size --}}
&lt;x-accelade::svg-icon :icon="$userIcon" size="xl" /&gt;

{{-- With tooltip --}}
&lt;x-accelade::svg-icon
    :icon="$settingsIcon"
    color="primary"
    size="lg"
    tooltip="Open settings"
/&gt;

{{-- PHP API --}}
Icon::make('&lt;svg&gt;...&lt;/svg&gt;')
    ->color('success')
    ->size('lg')
    ->tooltip('Verified');
    </x-accelade::code-block>
</section>
