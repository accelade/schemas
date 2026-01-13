{{-- Schema Components Overview --}}
@props(['prefix' => 'a'])

<!-- Demo: Schema Components Overview -->
<section class="rounded-xl p-6 mb-6 border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
    <div class="flex items-center gap-3 mb-2">
        <span class="w-2.5 h-2.5 bg-indigo-500 rounded-full"></span>
        <h3 class="text-lg font-semibold" style="color: var(--docs-text);">Schema Components Overview</h3>
    </div>
    <p class="text-sm mb-6" style="color: var(--docs-text-muted);">
        Accelade Schemas provides layout components for organizing forms, content, and data displays.
        All components support both slot-based Blade usage and programmatic PHP API.
    </p>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
        <!-- Section Component -->
        <div class="rounded-xl p-4 border border-indigo-500/30" style="background: rgba(99, 102, 241, 0.1);">
            <h4 class="font-medium mb-2 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-indigo-500/20 text-indigo-500 rounded">Layout</span>
                Section
            </h4>
            <p class="text-sm mb-3" style="color: var(--docs-text-muted);">
                Collapsible sections with heading, description, and icon support.
            </p>
            <code class="text-xs px-2 py-1 rounded border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                &lt;x-accelade::section&gt;
            </code>
        </div>

        <!-- Tabs Component -->
        <div class="rounded-xl p-4 border border-emerald-500/30" style="background: rgba(16, 185, 129, 0.1);">
            <h4 class="font-medium mb-2 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-emerald-500/20 text-emerald-500 rounded">Navigation</span>
                Tabs
            </h4>
            <p class="text-sm mb-3" style="color: var(--docs-text-muted);">
                Tabbed content panels with query string persistence and badges.
            </p>
            <code class="text-xs px-2 py-1 rounded border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                &lt;x-accelade::tabs&gt;
            </code>
        </div>

        <!-- Grid Component -->
        <div class="rounded-xl p-4 border border-amber-500/30" style="background: rgba(245, 158, 11, 0.1);">
            <h4 class="font-medium mb-2 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-amber-500/20 text-amber-500 rounded">Layout</span>
                Grid
            </h4>
            <p class="text-sm mb-3" style="color: var(--docs-text-muted);">
                Responsive multi-column grid layouts with configurable gap.
            </p>
            <code class="text-xs px-2 py-1 rounded border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                &lt;x-accelade::grid&gt;
            </code>
        </div>

        <!-- Wizard Component -->
        <div class="rounded-xl p-4 border border-purple-500/30" style="background: rgba(168, 85, 247, 0.1);">
            <h4 class="font-medium mb-2 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-purple-500/20 text-purple-500 rounded">Form</span>
                Wizard
            </h4>
            <p class="text-sm mb-3" style="color: var(--docs-text-muted);">
                Multi-step form wizard with navigation and progress indicators.
            </p>
            <code class="text-xs px-2 py-1 rounded border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                &lt;x-accelade::wizard&gt;
            </code>
        </div>

        <!-- Columns Component -->
        <div class="rounded-xl p-4 border border-sky-500/30" style="background: rgba(14, 165, 233, 0.1);">
            <h4 class="font-medium mb-2 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-sky-500/20 text-sky-500 rounded">Layout</span>
                Columns
            </h4>
            <p class="text-sm mb-3" style="color: var(--docs-text-muted);">
                Simple equal-width columns for inline layouts.
            </p>
            <code class="text-xs px-2 py-1 rounded border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                &lt;x-accelade::columns&gt;
            </code>
        </div>

        <!-- Fieldset Component -->
        <div class="rounded-xl p-4 border border-rose-500/30" style="background: rgba(244, 63, 94, 0.1);">
            <h4 class="font-medium mb-2 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-rose-500/20 text-rose-500 rounded">Form</span>
                Fieldset
            </h4>
            <p class="text-sm mb-3" style="color: var(--docs-text-muted);">
                HTML fieldset with legend for grouping form fields.
            </p>
            <code class="text-xs px-2 py-1 rounded border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                &lt;x-accelade::fieldset&gt;
            </code>
        </div>
    </div>

    <!-- Quick Example -->
    <div class="rounded-xl p-4 border border-[var(--docs-border)] mb-4" style="background: var(--docs-bg);">
        <h4 class="font-medium mb-3" style="color: var(--docs-text);">Quick Example: Nested Schemas</h4>

        <x-accelade::section heading="User Profile" description="Manage your account settings" collapsible>
            <x-accelade::grid :columns="2">
                <div class="p-3 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
                    <label class="block text-sm font-medium mb-1" style="color: var(--docs-text);">First Name</label>
                    <input type="text" placeholder="John" class="w-full px-3 py-2 rounded border border-[var(--docs-border)]" style="background: var(--docs-bg); color: var(--docs-text);">
                </div>
                <div class="p-3 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
                    <label class="block text-sm font-medium mb-1" style="color: var(--docs-text);">Last Name</label>
                    <input type="text" placeholder="Doe" class="w-full px-3 py-2 rounded border border-[var(--docs-border)]" style="background: var(--docs-bg); color: var(--docs-text);">
                </div>
            </x-accelade::grid>
        </x-accelade::section>
    </div>

    <x-accelade::code-block language="blade" filename="overview-example.blade.php">
{{-- Blade component usage --}}
&lt;x-accelade::section heading="User Profile" collapsible&gt;
    &lt;x-accelade::grid :columns="2"&gt;
        &lt;x-forms::text-input name="first_name" /&gt;
        &lt;x-forms::text-input name="last_name" /&gt;
    &lt;/x-accelade::grid&gt;
&lt;/x-accelade::section&gt;

{{-- PHP API usage --}}
use Accelade\Schemas\Components\Section;
use Accelade\Schemas\Components\Grid;

Section::make('profile')
    ->heading('User Profile')
    ->collapsible()
    ->schema([
        Grid::make(2)->schema([
            TextInput::make('first_name'),
            TextInput::make('last_name'),
        ]),
    ]);
    </x-accelade::code-block>
</section>
