{{-- UnorderedList Component Demo --}}
@props(['prefix' => 'a'])

<!-- Demo: UnorderedList Component -->
<section class="rounded-xl p-6 mb-6 border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
    <div class="flex items-center gap-3 mb-2">
        <span class="w-2.5 h-2.5 bg-indigo-500 rounded-full"></span>
        <h3 class="text-lg font-semibold" style="color: var(--docs-text);">UnorderedList Component</h3>
    </div>
    <p class="text-sm mb-6" style="color: var(--docs-text-muted);">
        Display bullet point lists with customizable styles using
        <code class="px-1.5 py-0.5 rounded text-sm border border-[var(--docs-border)]" style="background: var(--docs-bg);">&lt;x-accelade::unordered-list&gt;</code>.
    </p>

    <div class="space-y-6 mb-6">
        <!-- Basic List -->
        <div class="rounded-xl p-4 border border-indigo-500/30" style="background: rgba(99, 102, 241, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-indigo-500/20 text-indigo-500 rounded">Basic</span>
                Simple List
            </h4>

            <div class="p-4 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                <x-accelade::unordered-list :items="[
                    'First item in the list',
                    'Second item with more content',
                    'Third item follows',
                    'Fourth and final item',
                ]" />
            </div>
        </div>

        <!-- Size Variations -->
        <div class="rounded-xl p-4 border border-emerald-500/30" style="background: rgba(16, 185, 129, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-emerald-500/20 text-emerald-500 rounded">Sizes</span>
                Size Variations
            </h4>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-4 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <p class="text-xs mb-2 font-medium" style="color: var(--docs-text-muted);">Extra Small</p>
                    <x-accelade::unordered-list size="xs" :items="[
                        'Compact item one',
                        'Compact item two',
                        'Compact item three',
                    ]" />
                </div>
                <div class="p-4 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <p class="text-xs mb-2 font-medium" style="color: var(--docs-text-muted);">Small</p>
                    <x-accelade::unordered-list size="sm" :items="[
                        'Small item one',
                        'Small item two',
                        'Small item three',
                    ]" />
                </div>
                <div class="p-4 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <p class="text-xs mb-2 font-medium" style="color: var(--docs-text-muted);">Large</p>
                    <x-accelade::unordered-list size="lg" :items="[
                        'Large item one',
                        'Large item two',
                        'Large item three',
                    ]" />
                </div>
                <div class="p-4 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <p class="text-xs mb-2 font-medium" style="color: var(--docs-text-muted);">Extra Large</p>
                    <x-accelade::unordered-list size="xl" :items="[
                        'Extra large item',
                        'Another large item',
                    ]" />
                </div>
            </div>
        </div>

        <!-- Color Variations -->
        <div class="rounded-xl p-4 border border-amber-500/30" style="background: rgba(245, 158, 11, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-amber-500/20 text-amber-500 rounded">Colors</span>
                Color Options
            </h4>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="p-4 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <p class="text-xs mb-2 font-medium" style="color: var(--docs-text-muted);">Primary Bullets</p>
                    <x-accelade::unordered-list bulletColor="primary" :items="[
                        'Primary bullet',
                        'Another item',
                    ]" />
                </div>
                <div class="p-4 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <p class="text-xs mb-2 font-medium" style="color: var(--docs-text-muted);">Success Bullets</p>
                    <x-accelade::unordered-list bulletColor="success" :items="[
                        'Success bullet',
                        'Another item',
                    ]" />
                </div>
                <div class="p-4 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <p class="text-xs mb-2 font-medium" style="color: var(--docs-text-muted);">Danger Bullets</p>
                    <x-accelade::unordered-list bulletColor="danger" :items="[
                        'Danger bullet',
                        'Another item',
                    ]" />
                </div>
            </div>
        </div>

        <!-- Real World Example -->
        <div class="rounded-xl p-4 border border-purple-500/30" style="background: rgba(168, 85, 247, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-purple-500/20 text-purple-500 rounded">Example</span>
                Feature List
            </h4>

            <div class="p-4 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                <h5 class="font-semibold mb-3" style="color: var(--docs-text);">What's included:</h5>
                <x-accelade::unordered-list bulletColor="success" :items="[
                    'Unlimited projects and collaborators',
                    'Advanced analytics and reporting',
                    'Priority customer support',
                    'Custom integrations via API',
                    'SSO and enhanced security features',
                ]" />
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
                        <td class="py-2 px-3"><code class="text-indigo-500">items</code></td>
                        <td class="py-2 px-3">array</td>
                        <td class="py-2 px-3">[]</td>
                        <td class="py-2 px-3">Array of strings or Text components</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">size</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">'md'</td>
                        <td class="py-2 px-3">Text and bullet size (xs, sm, md, lg, xl)</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">color</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">'neutral'</td>
                        <td class="py-2 px-3">Text color (neutral, primary, success, warning, danger, muted)</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-3"><code class="text-indigo-500">bulletColor</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">'neutral'</td>
                        <td class="py-2 px-3">Bullet point color</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <x-accelade::code-block language="blade" filename="unordered-list-examples.blade.php">
{{-- Basic list --}}
&lt;x-accelade::unordered-list :items="[
    'First item',
    'Second item',
    'Third item',
]" /&gt;

{{-- With size --}}
&lt;x-accelade::unordered-list
    size="lg"
    :items="['Large item 1', 'Large item 2']"
/&gt;

{{-- With colors --}}
&lt;x-accelade::unordered-list
    bulletColor="success"
    :items="$features"
/&gt;

{{-- PHP API --}}
UnorderedList::make([
    'Feature one',
    'Feature two',
    Text::make('Highlighted feature')->color('primary'),
])
    ->size('md')
    ->bulletColor('success');
    </x-accelade::code-block>
</section>
