{{-- Grid Component Demo --}}
@props(['prefix' => 'a'])

<!-- Demo: Grid Component -->
<section class="rounded-xl p-6 mb-6 border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
    <div class="flex items-center gap-3 mb-2">
        <span class="w-2.5 h-2.5 bg-amber-500 rounded-full"></span>
        <h3 class="text-lg font-semibold" style="color: var(--docs-text);">Grid Component</h3>
    </div>
    <p class="text-sm mb-6" style="color: var(--docs-text-muted);">
        Responsive multi-column grid layouts with configurable columns and gap using
        <code class="px-1.5 py-0.5 rounded text-sm border border-[var(--docs-border)]" style="background: var(--docs-bg);">&lt;x-accelade::grid&gt;</code>.
    </p>

    <div class="space-y-6 mb-6">
        <!-- 2 Columns -->
        <div class="rounded-xl p-4 border border-amber-500/30" style="background: rgba(245, 158, 11, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-amber-500/20 text-amber-500 rounded">2 Cols</span>
                Two Columns
            </h4>

            <x-accelade::grid :columns="2">
                <div class="p-4 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <label class="block text-sm font-medium mb-1" style="color: var(--docs-text);">First Name</label>
                    <input type="text" placeholder="John" class="w-full px-3 py-2 rounded border border-[var(--docs-border)]" style="background: var(--docs-bg-alt); color: var(--docs-text);">
                </div>
                <div class="p-4 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <label class="block text-sm font-medium mb-1" style="color: var(--docs-text);">Last Name</label>
                    <input type="text" placeholder="Doe" class="w-full px-3 py-2 rounded border border-[var(--docs-border)]" style="background: var(--docs-bg-alt); color: var(--docs-text);">
                </div>
            </x-accelade::grid>
        </div>

        <!-- 3 Columns -->
        <div class="rounded-xl p-4 border border-indigo-500/30" style="background: rgba(99, 102, 241, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-indigo-500/20 text-indigo-500 rounded">3 Cols</span>
                Three Columns
            </h4>

            <x-accelade::grid :columns="3">
                <div class="p-4 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <div class="text-center">
                        <div class="w-12 h-12 mx-auto bg-indigo-500/20 rounded-full flex items-center justify-center mb-2">
                            <svg class="w-6 h-6 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <h5 class="font-medium" style="color: var(--docs-text);">Users</h5>
                        <p class="text-2xl font-bold text-indigo-500">1,234</p>
                    </div>
                </div>
                <div class="p-4 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <div class="text-center">
                        <div class="w-12 h-12 mx-auto bg-emerald-500/20 rounded-full flex items-center justify-center mb-2">
                            <svg class="w-6 h-6 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h5 class="font-medium" style="color: var(--docs-text);">Orders</h5>
                        <p class="text-2xl font-bold text-emerald-500">567</p>
                    </div>
                </div>
                <div class="p-4 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <div class="text-center">
                        <div class="w-12 h-12 mx-auto bg-amber-500/20 rounded-full flex items-center justify-center mb-2">
                            <svg class="w-6 h-6 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h5 class="font-medium" style="color: var(--docs-text);">Revenue</h5>
                        <p class="text-2xl font-bold text-amber-500">$89k</p>
                    </div>
                </div>
            </x-accelade::grid>
        </div>

        <!-- 4 Columns -->
        <div class="rounded-xl p-4 border border-purple-500/30" style="background: rgba(168, 85, 247, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-purple-500/20 text-purple-500 rounded">4 Cols</span>
                Four Columns
            </h4>

            <x-accelade::grid :columns="4" gap="2">
                @foreach(['Mon', 'Tue', 'Wed', 'Thu'] as $day)
                    <div class="p-3 rounded-lg border border-[var(--docs-border)] text-center" style="background: var(--docs-bg);">
                        <p class="text-xs" style="color: var(--docs-text-muted);">{{ $day }}</p>
                        <p class="text-lg font-bold text-purple-500">{{ rand(10, 99) }}</p>
                    </div>
                @endforeach
            </x-accelade::grid>
        </div>

        <!-- Custom Gap -->
        <div class="rounded-xl p-4 border border-sky-500/30" style="background: rgba(14, 165, 233, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-sky-500/20 text-sky-500 rounded">Gap</span>
                Custom Gap Spacing
            </h4>

            <div class="grid grid-cols-2 gap-6">
                <div>
                    <p class="text-sm mb-2" style="color: var(--docs-text-muted);">gap="2" (tight)</p>
                    <x-accelade::grid :columns="3" gap="2">
                        @for($i = 1; $i <= 3; $i++)
                            <div class="p-2 rounded border border-sky-500/50 text-center text-sm" style="background: var(--docs-bg);">{{ $i }}</div>
                        @endfor
                    </x-accelade::grid>
                </div>
                <div>
                    <p class="text-sm mb-2" style="color: var(--docs-text-muted);">gap="8" (loose)</p>
                    <x-accelade::grid :columns="3" gap="8">
                        @for($i = 1; $i <= 3; $i++)
                            <div class="p-2 rounded border border-sky-500/50 text-center text-sm" style="background: var(--docs-bg);">{{ $i }}</div>
                        @endfor
                    </x-accelade::grid>
                </div>
            </div>
        </div>

        <!-- Responsive Columns -->
        <div class="rounded-xl p-4 border border-emerald-500/30" style="background: rgba(16, 185, 129, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-emerald-500/20 text-emerald-500 rounded">Responsive</span>
                Responsive Columns
            </h4>
            <p class="text-sm mb-3" style="color: var(--docs-text-muted);">
                Pass an array for breakpoint-specific columns: <code class="px-1 rounded" style="background: var(--docs-bg);">['default' => 1, 'sm' => 2, 'lg' => 4]</code>
            </p>

            <x-accelade::grid :columns="['default' => 1, 'sm' => 2, 'lg' => 4]">
                @for($i = 1; $i <= 4; $i++)
                    <div class="p-4 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                        <p class="font-medium" style="color: var(--docs-text);">Card {{ $i }}</p>
                        <p class="text-sm" style="color: var(--docs-text-muted);">Resize window to see responsive columns</p>
                    </div>
                @endfor
            </x-accelade::grid>
        </div>
    </div>

    <!-- Props Table -->
    <div class="rounded-xl p-4 border border-[var(--docs-border)] mb-4" style="background: var(--docs-bg);">
        <h4 class="font-medium mb-4" style="color: var(--docs-text);">Component Props</h4>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-[var(--docs-border)]">
                        <th class="text-left py-2 px-3" style="color: var(--docs-text-muted);">Prop</th>
                        <th class="text-left py-2 px-3" style="color: var(--docs-text-muted);">Type</th>
                        <th class="text-left py-2 px-3" style="color: var(--docs-text-muted);">Default</th>
                        <th class="text-left py-2 px-3" style="color: var(--docs-text-muted);">Description</th>
                    </tr>
                </thead>
                <tbody style="color: var(--docs-text-muted);">
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-amber-500">columns</code></td>
                        <td class="py-2 px-3">int|array</td>
                        <td class="py-2 px-3">1</td>
                        <td class="py-2 px-3">Number of columns or responsive breakpoint array</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-3"><code class="text-amber-500">gap</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">"4"</td>
                        <td class="py-2 px-3">Gap between grid items (Tailwind spacing scale)</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <x-accelade::code-block language="blade" filename="grid-examples.blade.php">
{{-- Basic 2-column grid --}}
&lt;x-accelade::grid :columns="2"&gt;
    &lt;div&gt;Column 1&lt;/div&gt;
    &lt;div&gt;Column 2&lt;/div&gt;
&lt;/x-accelade::grid&gt;

{{-- 3-column grid with custom gap --}}
&lt;x-accelade::grid :columns="3" gap="6"&gt;
    &lt;x-card /&gt;
    &lt;x-card /&gt;
    &lt;x-card /&gt;
&lt;/x-accelade::grid&gt;

{{-- Responsive columns --}}
&lt;x-accelade::grid :columns="['default' => 1, 'sm' => 2, 'lg' => 4]"&gt;
    ...
&lt;/x-accelade::grid&gt;

{{-- PHP API --}}
Grid::make(3)
    ->gap('6')
    ->schema([
        TextInput::make('field1'),
        TextInput::make('field2'),
        TextInput::make('field3'),
    ]);

{{-- Responsive PHP API --}}
Grid::make([
    'default' => 1,
    'sm' => 2,
    'lg' => 3,
])->schema([...]);
    </x-accelade::code-block>
</section>
