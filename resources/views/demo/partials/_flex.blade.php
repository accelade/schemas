{{-- Flex Component Demo --}}
@props(['prefix' => 'a'])

<!-- Demo: Flex Component -->
<section class="rounded-xl p-6 mb-6 border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
    <div class="flex items-center gap-3 mb-2">
        <span class="w-2.5 h-2.5 bg-indigo-500 rounded-full"></span>
        <h3 class="text-lg font-semibold" style="color: var(--docs-text);">Flex Component</h3>
    </div>
    <p class="text-sm mb-6" style="color: var(--docs-text-muted);">
        Flexible width layouts using flexbox with
        <code class="px-1.5 py-0.5 rounded text-sm border border-[var(--docs-border)]" style="background: var(--docs-bg);">&lt;x-accelade::flex&gt;</code>.
    </p>

    <div class="space-y-6 mb-6">
        <!-- Basic Flex Row -->
        <div class="rounded-xl p-4 border border-indigo-500/30" style="background: rgba(99, 102, 241, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-indigo-500/20 text-indigo-500 rounded">Row</span>
                Basic Row Layout
            </h4>

            <x-accelade::flex gap="4">
                <div class="px-4 py-2 rounded-lg border border-[var(--docs-border)] flex-1" style="background: var(--docs-bg);">
                    <span style="color: var(--docs-text);">Item 1</span>
                </div>
                <div class="px-4 py-2 rounded-lg border border-[var(--docs-border)] flex-1" style="background: var(--docs-bg);">
                    <span style="color: var(--docs-text);">Item 2</span>
                </div>
                <div class="px-4 py-2 rounded-lg border border-[var(--docs-border)] flex-1" style="background: var(--docs-bg);">
                    <span style="color: var(--docs-text);">Item 3</span>
                </div>
            </x-accelade::flex>
        </div>

        <!-- Justify Between -->
        <div class="rounded-xl p-4 border border-emerald-500/30" style="background: rgba(16, 185, 129, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-emerald-500/20 text-emerald-500 rounded">Between</span>
                Justify Between
            </h4>

            <x-accelade::flex gap="4" justify="between">
                <div class="px-4 py-2 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <span style="color: var(--docs-text);">Start</span>
                </div>
                <div class="px-4 py-2 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <span style="color: var(--docs-text);">Middle</span>
                </div>
                <div class="px-4 py-2 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <span style="color: var(--docs-text);">End</span>
                </div>
            </x-accelade::flex>
        </div>

        <!-- Column Direction -->
        <div class="rounded-xl p-4 border border-amber-500/30" style="background: rgba(245, 158, 11, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-amber-500/20 text-amber-500 rounded">Column</span>
                Column Direction
            </h4>

            <x-accelade::flex gap="3" direction="col">
                <div class="px-4 py-2 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <span style="color: var(--docs-text);">Row 1</span>
                </div>
                <div class="px-4 py-2 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <span style="color: var(--docs-text);">Row 2</span>
                </div>
                <div class="px-4 py-2 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <span style="color: var(--docs-text);">Row 3</span>
                </div>
            </x-accelade::flex>
        </div>

        <!-- Centered Alignment -->
        <div class="rounded-xl p-4 border border-purple-500/30" style="background: rgba(168, 85, 247, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-purple-500/20 text-purple-500 rounded">Center</span>
                Centered Content
            </h4>

            <x-accelade::flex gap="4" justify="center" align="center" class="min-h-24">
                <div class="px-4 py-2 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <span style="color: var(--docs-text);">Centered</span>
                </div>
                <div class="px-6 py-4 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <span style="color: var(--docs-text);">Items</span>
                </div>
            </x-accelade::flex>
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
                        <td class="py-2 px-3"><code class="text-indigo-500">from</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">'md'</td>
                        <td class="py-2 px-3">Breakpoint at which flex activates (sm, md, lg, xl)</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">gap</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">'4'</td>
                        <td class="py-2 px-3">Tailwind gap value (1-12)</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">wrap</code></td>
                        <td class="py-2 px-3">bool</td>
                        <td class="py-2 px-3">true</td>
                        <td class="py-2 px-3">Enable flex wrapping</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">direction</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">'row'</td>
                        <td class="py-2 px-3">Flex direction (row, col, row-reverse, col-reverse)</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">justify</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">'start'</td>
                        <td class="py-2 px-3">Justify content (start, center, end, between, around)</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-3"><code class="text-indigo-500">align</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">'stretch'</td>
                        <td class="py-2 px-3">Align items (start, center, end, stretch, baseline)</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <x-accelade::code-block language="blade" filename="flex-examples.blade.php">
{{-- Basic flex row --}}
&lt;x-accelade::flex gap="4"&gt;
    &lt;div class="flex-1"&gt;Item 1&lt;/div&gt;
    &lt;div class="flex-1"&gt;Item 2&lt;/div&gt;
    &lt;div class="flex-1"&gt;Item 3&lt;/div&gt;
&lt;/x-accelade::flex&gt;

{{-- Justify between --}}
&lt;x-accelade::flex justify="between"&gt;
    &lt;div&gt;Left&lt;/div&gt;
    &lt;div&gt;Right&lt;/div&gt;
&lt;/x-accelade::flex&gt;

{{-- Column direction --}}
&lt;x-accelade::flex direction="col" gap="3"&gt;
    &lt;div&gt;Row 1&lt;/div&gt;
    &lt;div&gt;Row 2&lt;/div&gt;
&lt;/x-accelade::flex&gt;

{{-- PHP API --}}
Flex::make()
    ->from('md')
    ->gap('6')
    ->justifyBetween()
    ->alignCenter()
    ->schema([...]);
    </x-accelade::code-block>
</section>
