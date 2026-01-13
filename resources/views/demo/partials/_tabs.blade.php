{{-- Tabs Component Demo --}}
@props(['prefix' => 'a'])

@php
    $showAttr = match($prefix) {
        'v' => 'v-show',
        'data-state' => 'data-state-show',
        's' => 's-show',
        'ng' => 'ng-show',
        default => 'a-show',
    };
    $classAttr = match($prefix) {
        'v' => 'v-class',
        'data-state' => 'data-state-class',
        's' => 's-class',
        'ng' => 'ng-class',
        default => 'a-class',
    };
@endphp

<!-- Demo: Tabs Component -->
<section class="rounded-xl p-6 mb-6 border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
    <div class="flex items-center gap-3 mb-2">
        <span class="w-2.5 h-2.5 bg-emerald-500 rounded-full"></span>
        <h3 class="text-lg font-semibold" style="color: var(--docs-text);">Tabs Component</h3>
    </div>
    <p class="text-sm mb-6" style="color: var(--docs-text-muted);">
        Tabbed content panels with icons, badges, and query string persistence using
        <code class="px-1.5 py-0.5 rounded text-sm border border-[var(--docs-border)]" style="background: var(--docs-bg);">&lt;x-accelade::tabs&gt;</code>.
    </p>

    <div class="space-y-6 mb-6">
        <!-- Basic Tabs -->
        <div class="rounded-xl p-4 border border-emerald-500/30" style="background: rgba(16, 185, 129, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-emerald-500/20 text-emerald-500 rounded">Basic</span>
                Simple Tabs
            </h4>

            <x-accelade::data :default="['activeTab' => 0]">
                <div class="rounded-xl shadow-sm ring-1 ring-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <div class="flex px-4 overflow-x-auto" style="border-bottom: 1px solid var(--docs-border);">
                        <button type="button" @click="set('activeTab', 0)"
                            {{ $classAttr }}="{ 'border-indigo-500': activeTab === 0, 'text-indigo-600': activeTab === 0, 'border-transparent': activeTab !== 0 }"
                            class="px-4 py-3 text-sm font-medium border-b-2 -mb-px whitespace-nowrap" style="color: var(--docs-text);">
                            General
                        </button>
                        <button type="button" @click="set('activeTab', 1)"
                            {{ $classAttr }}="{ 'border-indigo-500': activeTab === 1, 'text-indigo-600': activeTab === 1, 'border-transparent': activeTab !== 1 }"
                            class="px-4 py-3 text-sm font-medium border-b-2 -mb-px whitespace-nowrap" style="color: var(--docs-text);">
                            Notifications
                        </button>
                        <button type="button" @click="set('activeTab', 2)"
                            {{ $classAttr }}="{ 'border-indigo-500': activeTab === 2, 'text-indigo-600': activeTab === 2, 'border-transparent': activeTab !== 2 }"
                            class="px-4 py-3 text-sm font-medium border-b-2 -mb-px whitespace-nowrap" style="color: var(--docs-text);">
                            Security
                        </button>
                    </div>
                    <div class="p-4">
                        <div {{ $showAttr }}="activeTab === 0">
                            <p style="color: var(--docs-text);">General settings content goes here.</p>
                        </div>
                        <div {{ $showAttr }}="activeTab === 1">
                            <p style="color: var(--docs-text);">Notification preferences content goes here.</p>
                        </div>
                        <div {{ $showAttr }}="activeTab === 2">
                            <p style="color: var(--docs-text);">Security options content goes here.</p>
                        </div>
                    </div>
                </div>
            </x-accelade::data>
        </div>

        <!-- Tabs with Icons and Badges -->
        <div class="rounded-xl p-4 border border-indigo-500/30" style="background: rgba(99, 102, 241, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-indigo-500/20 text-indigo-500 rounded">Enhanced</span>
                Tabs with Icons & Badges
            </h4>

            <x-accelade::data :default="['activeTab' => 0]">
                <div class="rounded-xl shadow-sm ring-1 ring-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <div class="flex px-4 overflow-x-auto" style="border-bottom: 1px solid var(--docs-border);">
                        <button type="button" @click="set('activeTab', 0)"
                            {{ $classAttr }}="{ 'border-indigo-500': activeTab === 0, 'text-indigo-600': activeTab === 0, 'border-transparent': activeTab !== 0 }"
                            class="flex items-center gap-2 px-4 py-3 text-sm font-medium border-b-2 -mb-px whitespace-nowrap" style="color: var(--docs-text);">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Inbox
                            <span class="ms-1 inline-flex items-center rounded-full bg-red-100 px-2 py-0.5 text-xs font-medium text-red-700">5</span>
                        </button>
                        <button type="button" @click="set('activeTab', 1)"
                            {{ $classAttr }}="{ 'border-indigo-500': activeTab === 1, 'text-indigo-600': activeTab === 1, 'border-transparent': activeTab !== 1 }"
                            class="flex items-center gap-2 px-4 py-3 text-sm font-medium border-b-2 -mb-px whitespace-nowrap" style="color: var(--docs-text);">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                            Sent
                        </button>
                        <button type="button" @click="set('activeTab', 2)"
                            {{ $classAttr }}="{ 'border-indigo-500': activeTab === 2, 'text-indigo-600': activeTab === 2, 'border-transparent': activeTab !== 2 }"
                            class="flex items-center gap-2 px-4 py-3 text-sm font-medium border-b-2 -mb-px whitespace-nowrap" style="color: var(--docs-text);">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                            </svg>
                            Archive
                            <span class="ms-1 inline-flex items-center rounded-full px-2 py-0.5 text-xs font-medium" style="background: var(--docs-bg-alt); color: var(--docs-text-muted);">23</span>
                        </button>
                    </div>
                    <div class="p-4">
                        <div {{ $showAttr }}="activeTab === 0">
                            <p style="color: var(--docs-text);">Your inbox messages appear here.</p>
                        </div>
                        <div {{ $showAttr }}="activeTab === 1">
                            <p style="color: var(--docs-text);">Sent messages history.</p>
                        </div>
                        <div {{ $showAttr }}="activeTab === 2">
                            <p style="color: var(--docs-text);">Archived messages.</p>
                        </div>
                    </div>
                </div>
            </x-accelade::data>
        </div>

        <!-- Vertical Tabs -->
        <div class="rounded-xl p-4 border border-purple-500/30" style="background: rgba(168, 85, 247, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-purple-500/20 text-purple-500 rounded">Vertical</span>
                Vertical Layout
            </h4>

            <x-accelade::data :default="['activeTab' => 0]">
                <div class="rounded-xl shadow-sm ring-1 ring-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <div class="flex flex-col sm:flex-row">
                        <div class="flex flex-row sm:flex-col sm:w-48 flex-shrink-0 overflow-x-auto" style="border-bottom: 1px solid var(--docs-border); border-inline-end: 1px solid var(--docs-border);">
                            <button type="button" @click="set('activeTab', 0)"
                                {{ $classAttr }}="{ 'border-indigo-500': activeTab === 0, 'text-indigo-600': activeTab === 0, 'border-transparent': activeTab !== 0 }"
                                class="px-4 py-3 text-sm font-medium border-b-2 sm:border-b-0 sm:border-e-2 -mb-px sm:mb-0 sm:-me-px text-start whitespace-nowrap" style="color: var(--docs-text);">
                                Account
                            </button>
                            <button type="button" @click="set('activeTab', 1)"
                                {{ $classAttr }}="{ 'border-indigo-500': activeTab === 1, 'text-indigo-600': activeTab === 1, 'border-transparent': activeTab !== 1 }"
                                class="px-4 py-3 text-sm font-medium border-b-2 sm:border-b-0 sm:border-e-2 -mb-px sm:mb-0 sm:-me-px text-start whitespace-nowrap" style="color: var(--docs-text);">
                                Billing
                            </button>
                            <button type="button" @click="set('activeTab', 2)"
                                {{ $classAttr }}="{ 'border-indigo-500': activeTab === 2, 'text-indigo-600': activeTab === 2, 'border-transparent': activeTab !== 2 }"
                                class="px-4 py-3 text-sm font-medium border-b-2 sm:border-b-0 sm:border-e-2 -mb-px sm:mb-0 sm:-me-px text-start whitespace-nowrap" style="color: var(--docs-text);">
                                Integrations
                            </button>
                        </div>
                        <div class="flex-1 p-4">
                            <div {{ $showAttr }}="activeTab === 0">
                                <h5 class="font-medium mb-2" style="color: var(--docs-text);">Account Settings</h5>
                                <p class="text-sm" style="color: var(--docs-text-muted);">Manage your account preferences and profile information.</p>
                            </div>
                            <div {{ $showAttr }}="activeTab === 1">
                                <h5 class="font-medium mb-2" style="color: var(--docs-text);">Billing Information</h5>
                                <p class="text-sm" style="color: var(--docs-text-muted);">View invoices and manage payment methods.</p>
                            </div>
                            <div {{ $showAttr }}="activeTab === 2">
                                <h5 class="font-medium mb-2" style="color: var(--docs-text);">Integrations</h5>
                                <p class="text-sm" style="color: var(--docs-text-muted);">Connect third-party services and APIs.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </x-accelade::data>
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
                        <td class="py-2 px-3"><code class="text-emerald-500">activeTab</code></td>
                        <td class="py-2 px-3">int|string</td>
                        <td class="py-2 px-3">0</td>
                        <td class="py-2 px-3">Initially active tab index or ID</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-emerald-500">vertical</code></td>
                        <td class="py-2 px-3">bool</td>
                        <td class="py-2 px-3">false</td>
                        <td class="py-2 px-3">Display tabs vertically</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-emerald-500">contained</code></td>
                        <td class="py-2 px-3">bool</td>
                        <td class="py-2 px-3">true</td>
                        <td class="py-2 px-3">Add container styling</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-3"><code class="text-emerald-500">persistInQueryString</code></td>
                        <td class="py-2 px-3">bool|string</td>
                        <td class="py-2 px-3">false</td>
                        <td class="py-2 px-3">Persist active tab in URL query string</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h5 class="font-medium mt-4 mb-2" style="color: var(--docs-text);">Tab Props</h5>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-[var(--docs-border)]">
                        <th class="text-start py-2 px-3" style="color: var(--docs-text-muted);">Prop</th>
                        <th class="text-start py-2 px-3" style="color: var(--docs-text-muted);">Type</th>
                        <th class="text-start py-2 px-3" style="color: var(--docs-text-muted);">Description</th>
                    </tr>
                </thead>
                <tbody style="color: var(--docs-text-muted);">
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-emerald-500">label</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">Tab button text</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-emerald-500">icon</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">HTML icon markup</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-emerald-500">badge</code></td>
                        <td class="py-2 px-3">string|int</td>
                        <td class="py-2 px-3">Badge content</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-3"><code class="text-emerald-500">badgeColor</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">Badge color (primary, danger, success, warning)</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <x-accelade::code-block language="php" filename="tabs-example.php">
use Accelade\Schemas\Components\Tabs;
use Accelade\Schemas\Components\Tab;

Tabs::make()
    ->tabs([
        Tab::make('general')
            ->label('General')
            ->icon('&lt;svg&gt;...&lt;/svg&gt;')
            ->schema([...]),

        Tab::make('notifications')
            ->label('Notifications')
            ->badge(5)
            ->badgeColor('danger')
            ->schema([...]),

        Tab::make('security')
            ->label('Security')
            ->hidden(fn () => !auth()->user()->isAdmin())
            ->schema([...]),
    ])
    ->activeTab('general')
    ->persistInQueryString('settings-tab')
    ->vertical();
    </x-accelade::code-block>
</section>
