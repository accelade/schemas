{{-- Empty State Component Demo --}}
@props(['prefix' => 'a'])

@php
    $folderIcon = '<svg class="w-full h-full" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" /></svg>';
    $searchIcon = '<svg class="w-full h-full" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>';
    $userIcon = '<svg class="w-full h-full" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>';
@endphp

<!-- Demo: Empty State Component -->
<section class="rounded-xl p-6 mb-6 border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
    <div class="flex items-center gap-3 mb-2">
        <span class="w-2.5 h-2.5 bg-indigo-500 rounded-full"></span>
        <h3 class="text-lg font-semibold" style="color: var(--docs-text);">Empty State Component</h3>
    </div>
    <p class="text-sm mb-6" style="color: var(--docs-text-muted);">
        Display meaningful empty states when no content is available using
        <code class="px-1.5 py-0.5 rounded text-sm border border-[var(--docs-border)]" style="background: var(--docs-bg);">&lt;x-accelade::empty-state&gt;</code>.
    </p>

    <div class="space-y-6 mb-6">
        <!-- Basic Empty State -->
        <div class="rounded-xl p-4 border border-indigo-500/30" style="background: rgba(99, 102, 241, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-indigo-500/20 text-indigo-500 rounded">Basic</span>
                Simple Empty State
            </h4>

            <x-accelade::empty-state
                heading="No posts yet"
                description="Get started by creating your first blog post."
                :icon="$folderIcon"
            />
        </div>

        <!-- With Action Buttons -->
        <div class="rounded-xl p-4 border border-emerald-500/30" style="background: rgba(16, 185, 129, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-emerald-500/20 text-emerald-500 rounded">Actions</span>
                With Call to Action
            </h4>

            <x-accelade::empty-state
                heading="No results found"
                description="Try adjusting your search or filter to find what you're looking for."
                :icon="$searchIcon"
                iconColor="blue"
            >
                <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                    Clear filters
                </button>
                <button class="px-4 py-2 rounded-lg border border-[var(--docs-border)] hover:bg-[var(--docs-bg-alt)] transition-colors" style="color: var(--docs-text);">
                    Try again
                </button>
            </x-accelade::empty-state>
        </div>

        <!-- Different Colors -->
        <div class="rounded-xl p-4 border border-amber-500/30" style="background: rgba(245, 158, 11, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-amber-500/20 text-amber-500 rounded">Colors</span>
                Color Variations
            </h4>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-accelade::empty-state
                    heading="No users"
                    description="Invite team members to get started."
                    :icon="$userIcon"
                    iconColor="green"
                    iconSize="md"
                />

                <x-accelade::empty-state
                    heading="Warning"
                    description="This section requires attention."
                    :icon="$folderIcon"
                    iconColor="warning"
                    iconSize="md"
                />
            </div>
        </div>

        <!-- Uncontained -->
        <div class="rounded-xl p-4 border border-purple-500/30" style="background: rgba(168, 85, 247, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-purple-500/20 text-purple-500 rounded">Inline</span>
                Without Container
            </h4>

            <x-accelade::empty-state
                heading="No items selected"
                description="Select items from the list to see details here."
                :icon="$folderIcon"
                :contained="false"
            />
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
                        <td class="py-2 px-3"><code class="text-indigo-500">heading</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">null</td>
                        <td class="py-2 px-3">Main heading text</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">description</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">null</td>
                        <td class="py-2 px-3">Description text below heading</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">icon</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">null</td>
                        <td class="py-2 px-3">SVG icon markup</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">iconColor</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">'gray'</td>
                        <td class="py-2 px-3">Icon color (gray, primary, success, warning, danger, info)</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">iconSize</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">'lg'</td>
                        <td class="py-2 px-3">Icon size (xs, sm, md, lg, xl)</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-3"><code class="text-indigo-500">contained</code></td>
                        <td class="py-2 px-3">bool</td>
                        <td class="py-2 px-3">true</td>
                        <td class="py-2 px-3">Show with container styling</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <x-accelade::code-block language="blade" filename="empty-state-examples.blade.php">
{{-- Basic empty state --}}
&lt;x-accelade::empty-state
    heading="No posts yet"
    description="Create your first post to get started."
    :icon="$folderIcon"
/&gt;

{{-- With action buttons --}}
&lt;x-accelade::empty-state
    heading="No results"
    description="Try different search terms."
    :icon="$searchIcon"
    iconColor="blue"
&gt;
    &lt;button&gt;Clear filters&lt;/button&gt;
&lt;/x-accelade::empty-state&gt;

{{-- PHP API --}}
EmptyState::make()
    ->heading('No posts yet')
    ->description('Create your first post.')
    ->icon('&lt;svg&gt;...&lt;/svg&gt;')
    ->iconColor('primary')
    ->iconSize('xl')
    ->schema([
        Button::make('Create Post'),
    ]);
    </x-accelade::code-block>
</section>
