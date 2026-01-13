{{-- Fieldset Component Demo --}}
@props(['prefix' => 'a'])

<!-- Demo: Fieldset Component -->
<section class="rounded-xl p-6 mb-6 border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
    <div class="flex items-center gap-3 mb-2">
        <span class="w-2.5 h-2.5 bg-rose-500 rounded-full"></span>
        <h3 class="text-lg font-semibold" style="color: var(--docs-text);">Fieldset Component</h3>
    </div>
    <p class="text-sm mb-6" style="color: var(--docs-text-muted);">
        Group related fields with a legend using the native HTML fieldset element with
        <code class="px-1.5 py-0.5 rounded text-sm border border-[var(--docs-border)]" style="background: var(--docs-bg);">{{ '<' }}x-accelade::fieldset></code>.
    </p>

    <div class="space-y-6 mb-6">
        <!-- Basic Fieldset -->
        <div class="rounded-xl p-4 border border-rose-500/30 bg-rose-500/10">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-rose-500/20 text-rose-500 rounded">Basic</span>
                Simple Fieldset
            </h4>

            <x-accelade::fieldset legend="Personal Information">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium mb-1" style="color: var(--docs-text-muted);">Full Name</label>
                        <input type="text" placeholder="John Doe" class="w-full px-3 py-2 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg); color: var(--docs-text);">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1" style="color: var(--docs-text-muted);">Date of Birth</label>
                        <input type="date" class="w-full px-3 py-2 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg); color: var(--docs-text);">
                    </div>
                </div>
            </x-accelade::fieldset>
        </div>

        <!-- With Columns -->
        <div class="rounded-xl p-4 border border-indigo-500/30 bg-indigo-500/10">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-indigo-500/20 text-indigo-500 rounded">Columns</span>
                Multi-Column Layout
            </h4>

            <x-accelade::fieldset legend="Contact Details" :columns="2">
                <div>
                    <label class="block text-sm font-medium mb-1" style="color: var(--docs-text-muted);">Email</label>
                    <input type="email" placeholder="john@example.com" class="w-full px-3 py-2 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg); color: var(--docs-text);">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" style="color: var(--docs-text-muted);">Phone</label>
                    <input type="tel" placeholder="+1 (555) 000-0000" class="w-full px-3 py-2 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg); color: var(--docs-text);">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" style="color: var(--docs-text-muted);">City</label>
                    <input type="text" placeholder="New York" class="w-full px-3 py-2 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg); color: var(--docs-text);">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" style="color: var(--docs-text-muted);">Country</label>
                    <select class="w-full px-3 py-2 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg); color: var(--docs-text);">
                        <option>United States</option>
                        <option>Canada</option>
                        <option>United Kingdom</option>
                    </select>
                </div>
            </x-accelade::fieldset>
        </div>

        <!-- Nested Fieldsets -->
        <div class="rounded-xl p-4 border border-amber-500/30 bg-amber-500/10">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-amber-500/20 text-amber-500 rounded">Nested</span>
                Nested Fieldsets
            </h4>

            <x-accelade::fieldset legend="Shipping Information">
                <div class="space-y-4">
                    <x-accelade::fieldset legend="Address" :columns="2">
                        <div class="col-span-full">
                            <label class="block text-sm font-medium mb-1" style="color: var(--docs-text-muted);">Street Address</label>
                            <input type="text" placeholder="123 Main St" class="w-full px-3 py-2 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg); color: var(--docs-text);">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1" style="color: var(--docs-text-muted);">City</label>
                            <input type="text" placeholder="City" class="w-full px-3 py-2 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg); color: var(--docs-text);">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1" style="color: var(--docs-text-muted);">Postal Code</label>
                            <input type="text" placeholder="12345" class="w-full px-3 py-2 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg); color: var(--docs-text);">
                        </div>
                    </x-accelade::fieldset>

                    <x-accelade::fieldset legend="Delivery Options">
                        <div class="space-y-2">
                            <label class="flex items-center gap-2">
                                <input type="radio" name="delivery" class="text-amber-500 focus:ring-amber-500">
                                <span style="color: var(--docs-text-muted);">Standard (5-7 days)</span>
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="radio" name="delivery" class="text-amber-500 focus:ring-amber-500">
                                <span style="color: var(--docs-text-muted);">Express (2-3 days)</span>
                            </label>
                        </div>
                    </x-accelade::fieldset>
                </div>
            </x-accelade::fieldset>
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
                        <td class="py-2 px-3"><code class="text-rose-500">legend</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">null</td>
                        <td class="py-2 px-3">Legend text displayed at the top of the fieldset</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-3"><code class="text-rose-500">columns</code></td>
                        <td class="py-2 px-3">int|array</td>
                        <td class="py-2 px-3">1</td>
                        <td class="py-2 px-3">Number of columns for the grid layout</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <x-accelade::code-block language="blade" filename="fieldset-examples.blade.php">
{{-- Basic fieldset --}}
{{ '<' }}x-accelade::fieldset legend="User Details">
    {{ '<' }}x-forms::text-input name="name" />
    {{ '<' }}x-forms::text-input name="email" />
{{ '<' }}/x-accelade::fieldset>

{{-- With columns --}}
{{ '<' }}x-accelade::fieldset legend="Address" :columns="2">
    {{ '<' }}x-forms::text-input name="city" />
    {{ '<' }}x-forms::text-input name="country" />
{{ '<' }}/x-accelade::fieldset>

{{-- PHP API --}}
Fieldset::make('shipping')
    ->legend('Shipping Address')
    ->columns(2)
    ->schema([
        TextInput::make('address'),
        TextInput::make('city'),
        TextInput::make('zip'),
        Select::make('country'),
    ]);
    </x-accelade::code-block>
</section>
