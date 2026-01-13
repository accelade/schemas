{{-- Columns Component Demo --}}
@props(['prefix' => 'a'])

<!-- Demo: Columns Component -->
<section class="rounded-xl p-6 mb-6 border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
    <div class="flex items-center gap-3 mb-2">
        <span class="w-2.5 h-2.5 bg-teal-500 rounded-full"></span>
        <h3 class="text-lg font-semibold" style="color: var(--docs-text);">Columns Component</h3>
    </div>
    <p class="text-sm mb-6" style="color: var(--docs-text-muted);">
        Simple equal-width column layouts using
        <code class="px-1.5 py-0.5 rounded text-sm border border-[var(--docs-border)]" style="background: var(--docs-bg);">&lt;x-accelade::columns&gt;</code>.
        Similar to Grid but optimized for equal-width columns.
    </p>

    <div class="space-y-6 mb-6">
        <!-- 2 Columns -->
        <div class="rounded-xl p-4 border border-teal-500/30" style="background: rgba(20, 184, 166, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-teal-500/20 text-teal-500 rounded">2</span>
                Two Columns
            </h4>

            <x-accelade::columns :columns="2">
                <div class="p-4 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <label class="block text-sm font-medium mb-1" style="color: var(--docs-text);">First Name</label>
                    <input type="text" placeholder="John" class="w-full px-3 py-2 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg-alt); color: var(--docs-text);">
                </div>
                <div class="p-4 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <label class="block text-sm font-medium mb-1" style="color: var(--docs-text);">Last Name</label>
                    <input type="text" placeholder="Doe" class="w-full px-3 py-2 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg-alt); color: var(--docs-text);">
                </div>
            </x-accelade::columns>
        </div>

        <!-- 3 Columns -->
        <div class="rounded-xl p-4 border border-indigo-500/30" style="background: rgba(99, 102, 241, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-indigo-500/20 text-indigo-500 rounded">3</span>
                Three Columns
            </h4>

            <x-accelade::columns :columns="3">
                @foreach(['Sales', 'Revenue', 'Growth'] as $metric)
                    <div class="p-4 rounded-lg border border-[var(--docs-border)] text-center" style="background: var(--docs-bg);">
                        <p class="text-sm" style="color: var(--docs-text-muted);">{{ $metric }}</p>
                        <p class="text-2xl font-bold text-indigo-600">{{ rand(10, 99) }}%</p>
                    </div>
                @endforeach
            </x-accelade::columns>
        </div>

        <!-- 4 Columns -->
        <div class="rounded-xl p-4 border border-purple-500/30" style="background: rgba(168, 85, 247, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-purple-500/20 text-purple-500 rounded">4</span>
                Four Columns
            </h4>

            <x-accelade::columns :columns="4">
                @foreach(['Jan', 'Feb', 'Mar', 'Apr'] as $month)
                    <div class="p-3 rounded-lg border border-[var(--docs-border)] text-center" style="background: var(--docs-bg);">
                        <p class="text-xs" style="color: var(--docs-text-muted);">{{ $month }}</p>
                        <p class="text-lg font-bold text-purple-600">${{ rand(1, 9) }}k</p>
                    </div>
                @endforeach
            </x-accelade::columns>
        </div>

        <!-- Custom Gap -->
        <div class="rounded-xl p-4 border border-amber-500/30" style="background: rgba(245, 158, 11, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-amber-500/20 text-amber-500 rounded">Gap</span>
                Custom Gap
            </h4>

            <div class="space-y-4">
                <div>
                    <p class="text-sm mb-2" style="color: var(--docs-text-muted);">gap="2" (tight)</p>
                    <x-accelade::columns :columns="4" gap="2">
                        @for($i = 1; $i <= 4; $i++)
                            <div class="p-2 rounded bg-amber-100 text-center text-sm text-amber-700">{{ $i }}</div>
                        @endfor
                    </x-accelade::columns>
                </div>
                <div>
                    <p class="text-sm mb-2" style="color: var(--docs-text-muted);">gap="6" (loose)</p>
                    <x-accelade::columns :columns="4" gap="6">
                        @for($i = 1; $i <= 4; $i++)
                            <div class="p-2 rounded bg-amber-100 text-center text-sm text-amber-700">{{ $i }}</div>
                        @endfor
                    </x-accelade::columns>
                </div>
            </div>
        </div>

        <!-- Responsive -->
        <div class="rounded-xl p-4 border border-emerald-500/30" style="background: rgba(16, 185, 129, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-emerald-500/20 text-emerald-500 rounded">Responsive</span>
                Responsive Breakpoints
            </h4>
            <p class="text-sm mb-3" style="color: var(--docs-text-muted);">
                Columns automatically stack on smaller screens. 2 columns become 1 on mobile, 3+ columns become 2 on tablet.
            </p>

            <x-accelade::columns :columns="['default' => 1, 'sm' => 2, 'lg' => 4]">
                @for($i = 1; $i <= 4; $i++)
                    <div class="p-4 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                        <p class="font-medium" style="color: var(--docs-text);">Card {{ $i }}</p>
                        <p class="text-sm" style="color: var(--docs-text-muted);">Resize to see responsive behavior</p>
                    </div>
                @endfor
            </x-accelade::columns>
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
                        <td class="py-2 px-3"><code class="text-teal-500">columns</code></td>
                        <td class="py-2 px-3">int|array</td>
                        <td class="py-2 px-3">2</td>
                        <td class="py-2 px-3">Number of columns or responsive breakpoint array</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-3"><code class="text-teal-500">gap</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">"4"</td>
                        <td class="py-2 px-3">Gap between columns (Tailwind spacing)</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <x-accelade::code-block language="blade" filename="columns-examples.blade.php">
{{-- Basic 2 columns --}}
&lt;x-accelade::columns :columns="2"&gt;
    &lt;x-forms::text-input name="first_name" /&gt;
    &lt;x-forms::text-input name="last_name" /&gt;
&lt;/x-accelade::columns&gt;

{{-- 3 columns with gap --}}
&lt;x-accelade::columns :columns="3" gap="6"&gt;
    &lt;x-card title="Card 1" /&gt;
    &lt;x-card title="Card 2" /&gt;
    &lt;x-card title="Card 3" /&gt;
&lt;/x-accelade::columns&gt;

{{-- Responsive columns --}}
&lt;x-accelade::columns :columns="['default' => 1, 'sm' => 2, 'lg' => 4]"&gt;
    ...
&lt;/x-accelade::columns&gt;

{{-- PHP API --}}
Columns::make(3)
    ->gap('6')
    ->schema([
        TextInput::make('field1'),
        TextInput::make('field2'),
        TextInput::make('field3'),
    ]);
    </x-accelade::code-block>
</section>
