{{-- Text Component Demo --}}
@props(['prefix' => 'a'])

@php
    $checkIcon = '<svg class="w-full h-full" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>';
    $starIcon = '<svg class="w-full h-full" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" /></svg>';
@endphp

<!-- Demo: Text Component -->
<section class="rounded-xl p-6 mb-6 border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
    <div class="flex items-center gap-3 mb-2">
        <span class="w-2.5 h-2.5 bg-indigo-500 rounded-full"></span>
        <h3 class="text-lg font-semibold" style="color: var(--docs-text);">Text Component</h3>
    </div>
    <p class="text-sm mb-6" style="color: var(--docs-text-muted);">
        Display styled text content with colors, sizes, and badges using
        <code class="px-1.5 py-0.5 rounded text-sm border border-[var(--docs-border)]" style="background: var(--docs-bg);">&lt;x-accelade::text&gt;</code>.
    </p>

    <div class="space-y-6 mb-6">
        <!-- Basic Text -->
        <div class="rounded-xl p-4 border border-indigo-500/30" style="background: rgba(99, 102, 241, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-indigo-500/20 text-indigo-500 rounded">Basic</span>
                Simple Text
            </h4>

            <div class="space-y-2">
                <div><x-accelade::text content="Default neutral text" /></div>
                <div><x-accelade::text content="Primary colored text" color="primary" /></div>
                <div><x-accelade::text content="Success colored text" color="success" /></div>
                <div><x-accelade::text content="Warning colored text" color="warning" /></div>
                <div><x-accelade::text content="Danger colored text" color="danger" /></div>
                <div><x-accelade::text content="Muted text" color="muted" /></div>
            </div>
        </div>

        <!-- Sizes and Weights -->
        <div class="rounded-xl p-4 border border-emerald-500/30" style="background: rgba(16, 185, 129, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-emerald-500/20 text-emerald-500 rounded">Sizes</span>
                Sizes & Weights
            </h4>

            <div class="space-y-2">
                <div><x-accelade::text content="Extra small text" size="xs" /></div>
                <div><x-accelade::text content="Small text" size="sm" /></div>
                <div><x-accelade::text content="Medium text (default)" size="md" /></div>
                <div><x-accelade::text content="Large text" size="lg" /></div>
                <div><x-accelade::text content="Extra large text" size="xl" /></div>
            </div>

            <div class="mt-4 space-y-2">
                <div><x-accelade::text content="Light weight" weight="light" /></div>
                <div><x-accelade::text content="Normal weight" weight="normal" /></div>
                <div><x-accelade::text content="Medium weight" weight="medium" /></div>
                <div><x-accelade::text content="Semibold weight" weight="semibold" /></div>
                <div><x-accelade::text content="Bold weight" weight="bold" /></div>
            </div>
        </div>

        <!-- Badges -->
        <div class="rounded-xl p-4 border border-amber-500/30" style="background: rgba(245, 158, 11, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-amber-500/20 text-amber-500 rounded">Badges</span>
                Badge Style
            </h4>

            <div class="flex flex-wrap gap-2">
                <x-accelade::text content="Default" :badge="true" />
                <x-accelade::text content="Primary" :badge="true" color="primary" />
                <x-accelade::text content="Success" :badge="true" color="success" />
                <x-accelade::text content="Warning" :badge="true" color="warning" />
                <x-accelade::text content="Danger" :badge="true" color="danger" />
                <x-accelade::text content="Info" :badge="true" color="info" />
            </div>

            <div class="mt-4 flex flex-wrap gap-2">
                <x-accelade::text content="Verified" :badge="true" color="success" :icon="$checkIcon" />
                <x-accelade::text content="Featured" :badge="true" color="warning" :icon="$starIcon" />
            </div>
        </div>

        <!-- Font Families -->
        <div class="rounded-xl p-4 border border-purple-500/30" style="background: rgba(168, 85, 247, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-purple-500/20 text-purple-500 rounded">Fonts</span>
                Font Families
            </h4>

            <div class="space-y-2">
                <div><x-accelade::text content="Sans-serif font (default)" fontFamily="sans" /></div>
                <div><x-accelade::text content="Serif font family" fontFamily="serif" /></div>
                <div><x-accelade::text content="Monospace font family" fontFamily="mono" /></div>
            </div>
        </div>

        <!-- With Tooltip and Copyable -->
        <div class="rounded-xl p-4 border border-rose-500/30" style="background: rgba(244, 63, 94, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-rose-500/20 text-rose-500 rounded">Features</span>
                Advanced Features
            </h4>

            <div class="space-y-3">
                <div>
                    <span class="text-sm" style="color: var(--docs-text-muted);">Hover for tooltip:</span>
                    <x-accelade::text content="Hover me" tooltip="This is a helpful tooltip!" color="primary" />
                </div>
                <div>
                    <span class="text-sm" style="color: var(--docs-text-muted);">Copyable text:</span>
                    <x-accelade::text content="Click to copy" :copyable="true" color="info" />
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
                        <td class="py-2 px-3"><code class="text-indigo-500">content</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">null</td>
                        <td class="py-2 px-3">The text content to display</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">color</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">'neutral'</td>
                        <td class="py-2 px-3">Text color (neutral, primary, success, warning, danger, info, muted)</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">badge</code></td>
                        <td class="py-2 px-3">bool</td>
                        <td class="py-2 px-3">false</td>
                        <td class="py-2 px-3">Display as pill badge</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">size</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">'md'</td>
                        <td class="py-2 px-3">Font size (xs, sm, md, lg, xl)</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">weight</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">'normal'</td>
                        <td class="py-2 px-3">Font weight (thin, light, normal, medium, semibold, bold, etc.)</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">fontFamily</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">'sans'</td>
                        <td class="py-2 px-3">Font family (sans, serif, mono)</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">icon</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">null</td>
                        <td class="py-2 px-3">SVG icon for badge mode</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">tooltip</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">null</td>
                        <td class="py-2 px-3">Tooltip text on hover</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-3"><code class="text-indigo-500">copyable</code></td>
                        <td class="py-2 px-3">bool</td>
                        <td class="py-2 px-3">false</td>
                        <td class="py-2 px-3">Make text copyable to clipboard</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <x-accelade::code-block language="blade" filename="text-examples.blade.php">
{{-- Basic text --}}
&lt;x-accelade::text content="Hello world" /&gt;

{{-- Colored text --}}
&lt;x-accelade::text content="Success!" color="success" /&gt;

{{-- Badge style --}}
&lt;x-accelade::text content="New" :badge="true" color="primary" /&gt;

{{-- With icon --}}
&lt;x-accelade::text content="Verified" :badge="true" color="success" :icon="$checkIcon" /&gt;

{{-- Styled text --}}
&lt;x-accelade::text
    content="Heading"
    size="xl"
    weight="bold"
    fontFamily="serif"
/&gt;

{{-- PHP API --}}
Text::make('Hello world')
    ->color('success')
    ->badge()
    ->size('lg')
    ->weight('semibold')
    ->icon('&lt;svg&gt;...&lt;/svg&gt;')
    ->tooltip('More info')
    ->copyable();
    </x-accelade::code-block>
</section>
