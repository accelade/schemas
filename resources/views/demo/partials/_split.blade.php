{{-- Split Component Demo --}}
@props(['prefix' => 'a'])

<!-- Demo: Split Component -->
<section class="rounded-xl p-6 mb-6 border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
    <div class="flex items-center gap-3 mb-2">
        <span class="w-2.5 h-2.5 bg-orange-500 rounded-full"></span>
        <h3 class="text-lg font-semibold" style="color: var(--docs-text);">Split Component</h3>
    </div>
    <p class="text-sm mb-6" style="color: var(--docs-text-muted);">
        Two-column layout with configurable width ratios using
        <code class="px-1.5 py-0.5 rounded text-sm border-[var(--docs-border)]" style="background: var(--docs-bg);">{{ '<' }}x-accelade::split></code>.
    </p>

    <div class="space-y-6 mb-6">
        <!-- 50/50 Split -->
        <div class="rounded-xl p-4 border border-orange-500/30 bg-orange-500/10">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-orange-500/20 text-orange-500 rounded">50/50</span>
                Equal Split
            </h4>

            <x-accelade::split>
                <x-slot:left>
                    <div class="p-4 rounded-lg border-[var(--docs-border)]" style="background: var(--docs-bg);">
                        <h5 class="font-medium mb-2" style="color: var(--docs-text);">Left Column</h5>
                        <p class="text-sm" style="color: var(--docs-text-muted);">This takes 50% width on medium screens and up.</p>
                    </div>
                </x-slot:left>
                <x-slot:right>
                    <div class="p-4 rounded-lg border-[var(--docs-border)]" style="background: var(--docs-bg);">
                        <h5 class="font-medium mb-2" style="color: var(--docs-text);">Right Column</h5>
                        <p class="text-sm" style="color: var(--docs-text-muted);">This also takes 50% width on medium screens and up.</p>
                    </div>
                </x-slot:right>
            </x-accelade::split>
        </div>

        <!-- 1/3 - 2/3 Split -->
        <div class="rounded-xl p-4 border border-indigo-500/30 bg-indigo-500/10">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-indigo-500/20 text-indigo-500 rounded">1/3 - 2/3</span>
                Sidebar Layout
            </h4>

            <x-accelade::split leftWidth="1/3" rightWidth="2/3">
                <x-slot:left>
                    <div class="p-4 rounded-lg border-[var(--docs-border)] h-full" style="background: var(--docs-bg);">
                        <h5 class="font-medium mb-2" style="color: var(--docs-text);">Sidebar</h5>
                        <ul class="space-y-2 text-sm" style="color: var(--docs-text-muted);">
                            <li class="flex items-center gap-2">
                                <span class="w-1.5 h-1.5 bg-indigo-500 rounded-full"></span>
                                Dashboard
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full" style="background: var(--docs-text-muted);"></span>
                                Settings
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full" style="background: var(--docs-text-muted);"></span>
                                Profile
                            </li>
                        </ul>
                    </div>
                </x-slot:left>
                <x-slot:right>
                    <div class="p-4 rounded-lg border-[var(--docs-border)]" style="background: var(--docs-bg);">
                        <h5 class="font-medium mb-2" style="color: var(--docs-text);">Main Content</h5>
                        <p class="text-sm" style="color: var(--docs-text-muted);">The main content area takes 2/3 of the available width. Perfect for dashboard layouts with a sidebar.</p>
                    </div>
                </x-slot:right>
            </x-accelade::split>
        </div>

        <!-- 2/3 - 1/3 Split -->
        <div class="rounded-xl p-4 border border-emerald-500/30 bg-emerald-500/10">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-emerald-500/20 text-emerald-500 rounded">2/3 - 1/3</span>
                Content with Aside
            </h4>

            <x-accelade::split leftWidth="2/3" rightWidth="1/3">
                <x-slot:left>
                    <div class="p-4 rounded-lg border-[var(--docs-border)]" style="background: var(--docs-bg);">
                        <h5 class="font-medium mb-2" style="color: var(--docs-text);">Article Content</h5>
                        <p class="text-sm mb-2" style="color: var(--docs-text-muted);">This is the main content area where your article or primary content would go.</p>
                        <p class="text-sm" style="color: var(--docs-text-muted);">The wider column provides more space for reading content while keeping related information accessible in the aside.</p>
                    </div>
                </x-slot:left>
                <x-slot:right>
                    <div class="p-4 rounded-lg border-[var(--docs-border)]" style="background: var(--docs-bg);">
                        <h5 class="font-medium mb-2" style="color: var(--docs-text);">Related</h5>
                        <div class="space-y-2">
                            <a href="#" class="block text-sm text-emerald-600 hover:underline">Related Article 1</a>
                            <a href="#" class="block text-sm text-emerald-600 hover:underline">Related Article 2</a>
                            <a href="#" class="block text-sm text-emerald-600 hover:underline">Related Article 3</a>
                        </div>
                    </div>
                </x-slot:right>
            </x-accelade::split>
        </div>

        <!-- Custom Gap -->
        <div class="rounded-xl p-4 border border-purple-500/30 bg-purple-500/10">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-purple-500/20 text-purple-500 rounded">Gap</span>
                Custom Gap Spacing
            </h4>

            <x-accelade::split gap="8">
                <x-slot:left>
                    <div class="p-4 rounded-lg border-[var(--docs-border)]" style="background: var(--docs-bg);">
                        <p class="text-sm" style="color: var(--docs-text-muted);">Left with larger gap</p>
                    </div>
                </x-slot:left>
                <x-slot:right>
                    <div class="p-4 rounded-lg border-[var(--docs-border)]" style="background: var(--docs-bg);">
                        <p class="text-sm" style="color: var(--docs-text-muted);">Right with larger gap</p>
                    </div>
                </x-slot:right>
            </x-accelade::split>
        </div>
    </div>

    <!-- Props Table -->
    <div class="rounded-xl p-4 border-[var(--docs-border)] mb-4" style="background: var(--docs-bg);">
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
                        <td class="py-2 px-3"><code class="text-orange-500">leftWidth</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">"1/2"</td>
                        <td class="py-2 px-3">Left column width (1/2, 1/3, 2/3, 1/4, 3/4)</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-orange-500">rightWidth</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">"1/2"</td>
                        <td class="py-2 px-3">Right column width</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-orange-500">from</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">"md"</td>
                        <td class="py-2 px-3">Breakpoint to apply split (sm, md, lg, xl)</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-3"><code class="text-orange-500">gap</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">"4"</td>
                        <td class="py-2 px-3">Gap between columns</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <x-accelade::code-block language="blade" filename="split-examples.blade.php">
{{-- Equal split --}}
{{ '<' }}x-accelade::split>
    {{ '<' }}x-slot:left>Left content{{ '<' }}/x-slot:left>
    {{ '<' }}x-slot:right>Right content{{ '<' }}/x-slot:right>
{{ '<' }}/x-accelade::split>

{{-- Sidebar layout (1/3 - 2/3) --}}
{{ '<' }}x-accelade::split leftWidth="1/3" rightWidth="2/3">
    {{ '<' }}x-slot:left>Sidebar{{ '<' }}/x-slot:left>
    {{ '<' }}x-slot:right>Main content{{ '<' }}/x-slot:right>
{{ '<' }}/x-accelade::split>

{{-- PHP API --}}
Split::make('layout')
    ->leftWidth('1/3')
    ->rightWidth('2/3')
    ->from('lg')
    ->gap('6')
    ->schema([
        Sidebar::make(...),
        Content::make(...),
    ]);
    </x-accelade::code-block>
</section>
