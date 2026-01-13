{{-- Section Component Demo --}}
@props(['prefix' => 'a'])

@php
    $securityIcon = '<svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>';
@endphp

<!-- Demo: Section Component -->
<section class="rounded-xl p-6 mb-6 border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
    <div class="flex items-center gap-3 mb-2">
        <span class="w-2.5 h-2.5 bg-indigo-500 rounded-full"></span>
        <h3 class="text-lg font-semibold" style="color: var(--docs-text);">Section Component</h3>
    </div>
    <p class="text-sm mb-6" style="color: var(--docs-text-muted);">
        Collapsible sections with heading, description, icon, and multi-column support using
        <code class="px-1.5 py-0.5 rounded text-sm border border-[var(--docs-border)]" style="background: var(--docs-bg);">&lt;x-accelade::section&gt;</code>.
    </p>

    <div class="space-y-6 mb-6">
        <!-- Basic Section -->
        <div class="rounded-xl p-4 border border-indigo-500/30" style="background: rgba(99, 102, 241, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-indigo-500/20 text-indigo-500 rounded">Basic</span>
                Simple Section
            </h4>

            <x-accelade::section heading="Personal Information" description="Enter your personal details below.">
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium mb-1" style="color: var(--docs-text);">Full Name</label>
                        <input type="text" placeholder="John Doe" class="w-full px-3 py-2 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg); color: var(--docs-text);">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1" style="color: var(--docs-text);">Email</label>
                        <input type="email" placeholder="john@example.com" class="w-full px-3 py-2 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg); color: var(--docs-text);">
                    </div>
                </div>
            </x-accelade::section>
        </div>

        <!-- Collapsible Section -->
        <div class="rounded-xl p-4 border border-emerald-500/30" style="background: rgba(16, 185, 129, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-emerald-500/20 text-emerald-500 rounded">Collapsible</span>
                Expandable Section
            </h4>
            <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                Click the header to expand/collapse the content.
            </p>

            <x-accelade::section heading="Advanced Settings" description="Optional configuration options." collapsible collapsed>
                <div class="space-y-3">
                    <div class="flex items-center gap-2">
                        <input type="checkbox" id="debug-mode" class="rounded">
                        <label for="debug-mode" class="text-sm" style="color: var(--docs-text);">Enable debug mode</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="checkbox" id="analytics" class="rounded">
                        <label for="analytics" class="text-sm" style="color: var(--docs-text);">Send analytics</label>
                    </div>
                </div>
            </x-accelade::section>
        </div>

        <!-- Section with Icon -->
        <div class="rounded-xl p-4 border border-amber-500/30" style="background: rgba(245, 158, 11, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-amber-500/20 text-amber-500 rounded">Icon</span>
                Section with Icon
            </h4>

            <x-accelade::section
                heading="Security Settings"
                description="Manage your account security."
                :icon="$securityIcon"
                collapsible
            >
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium mb-1" style="color: var(--docs-text);">Current Password</label>
                        <input type="password" placeholder="********" class="w-full px-3 py-2 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg); color: var(--docs-text);">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1" style="color: var(--docs-text);">New Password</label>
                        <input type="password" placeholder="********" class="w-full px-3 py-2 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg); color: var(--docs-text);">
                    </div>
                </div>
            </x-accelade::section>
        </div>

        <!-- Multi-column Section -->
        <div class="rounded-xl p-4 border border-purple-500/30" style="background: rgba(168, 85, 247, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-purple-500/20 text-purple-500 rounded">Columns</span>
                Multi-column Layout
            </h4>

            <x-accelade::section heading="Contact Details" :columns="2">
                <div class="p-3 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <label class="block text-sm font-medium mb-1" style="color: var(--docs-text);">Phone</label>
                    <input type="tel" placeholder="+1 (555) 000-0000" class="w-full px-3 py-2 rounded border border-[var(--docs-border)]" style="background: var(--docs-bg-alt); color: var(--docs-text);">
                </div>
                <div class="p-3 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <label class="block text-sm font-medium mb-1" style="color: var(--docs-text);">Mobile</label>
                    <input type="tel" placeholder="+1 (555) 111-1111" class="w-full px-3 py-2 rounded border border-[var(--docs-border)]" style="background: var(--docs-bg-alt); color: var(--docs-text);">
                </div>
                <div class="p-3 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <label class="block text-sm font-medium mb-1" style="color: var(--docs-text);">Work Email</label>
                    <input type="email" placeholder="work@company.com" class="w-full px-3 py-2 rounded border border-[var(--docs-border)]" style="background: var(--docs-bg-alt); color: var(--docs-text);">
                </div>
                <div class="p-3 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <label class="block text-sm font-medium mb-1" style="color: var(--docs-text);">Personal Email</label>
                    <input type="email" placeholder="personal@email.com" class="w-full px-3 py-2 rounded border border-[var(--docs-border)]" style="background: var(--docs-bg-alt); color: var(--docs-text);">
                </div>
            </x-accelade::section>
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
                        <td class="py-2 px-3">Section title</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">description</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">null</td>
                        <td class="py-2 px-3">Section subtitle/description</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">icon</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">null</td>
                        <td class="py-2 px-3">HTML icon markup</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">collapsible</code></td>
                        <td class="py-2 px-3">bool</td>
                        <td class="py-2 px-3">false</td>
                        <td class="py-2 px-3">Enable collapse/expand</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">collapsed</code></td>
                        <td class="py-2 px-3">bool</td>
                        <td class="py-2 px-3">false</td>
                        <td class="py-2 px-3">Start collapsed (requires collapsible)</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">columns</code></td>
                        <td class="py-2 px-3">int|array</td>
                        <td class="py-2 px-3">1</td>
                        <td class="py-2 px-3">Grid columns (responsive array supported)</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">aside</code></td>
                        <td class="py-2 px-3">bool</td>
                        <td class="py-2 px-3">false</td>
                        <td class="py-2 px-3">Display as aside layout</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-3"><code class="text-indigo-500">compact</code></td>
                        <td class="py-2 px-3">bool</td>
                        <td class="py-2 px-3">false</td>
                        <td class="py-2 px-3">Use compact padding</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <x-accelade::code-block language="blade" filename="section-examples.blade.php">
{{-- Basic section --}}
&lt;x-accelade::section heading="Profile" description="Your account details"&gt;
    &lt;x-forms::text-input name="name" /&gt;
    &lt;x-forms::text-input name="email" /&gt;
&lt;/x-accelade::section&gt;

{{-- Collapsible section --}}
&lt;x-accelade::section heading="Advanced" collapsible collapsed&gt;
    ...
&lt;/x-accelade::section&gt;

{{-- With icon and columns --}}
&lt;x-accelade::section
    heading="Security"
    :icon="'&lt;svg&gt;...&lt;/svg&gt;'"
    :columns="2"
    collapsible
&gt;
    ...
&lt;/x-accelade::section&gt;

{{-- PHP API --}}
Section::make('security')
    ->heading('Security Settings')
    ->description('Manage passwords and 2FA')
    ->icon('&lt;svg&gt;...&lt;/svg&gt;')
    ->collapsible()
    ->collapsed()
    ->columns(2)
    ->schema([...]);
    </x-accelade::code-block>
</section>
