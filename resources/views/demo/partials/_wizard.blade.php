{{-- Wizard Component Demo --}}
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

<!-- Demo: Wizard Component -->
<section class="rounded-xl p-6 mb-6 border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
    <div class="flex items-center gap-3 mb-2">
        <span class="w-2.5 h-2.5 bg-purple-500 rounded-full"></span>
        <h3 class="text-lg font-semibold" style="color: var(--docs-text);">Wizard Component</h3>
    </div>
    <p class="text-sm mb-6" style="color: var(--docs-text-muted);">
        Multi-step form wizard with progress indicators, navigation controls, and validation using
        <code class="px-1.5 py-0.5 rounded text-sm border border-[var(--docs-border)]" style="background: var(--docs-bg);">&lt;x-accelade::wizard&gt;</code>.
    </p>

    <div class="space-y-6 mb-6">
        <!-- Basic Wizard -->
        <div class="rounded-xl p-4 border border-purple-500/30" style="background: rgba(168, 85, 247, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-purple-500/20 text-purple-500 rounded">Basic</span>
                Registration Wizard
            </h4>

            <x-accelade::data :default="['currentStep' => 0, 'totalSteps' => 3]">
                <div class="rounded-xl shadow-sm ring-1 ring-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <!-- Step indicators -->
                    <div class="border-b border-[var(--docs-border)]">
                        <nav class="flex justify-center overflow-x-auto" aria-label="Progress">
                            <ol class="flex items-center gap-2 sm:gap-5 px-4 sm:px-6 py-4">
                                <li>
                                    <button type="button" @click="set('currentStep', 0)" class="flex items-center">
                                        <span {{ $classAttr }}="{ 'bg-indigo-600': currentStep >= 0, 'text-white': currentStep >= 0 }" class="flex h-8 w-8 items-center justify-center rounded-full transition-colors text-sm font-medium" style="background: var(--docs-bg-alt); color: var(--docs-text-muted);">1</span>
                                        <span class="ms-2 sm:ms-3 text-sm font-medium hidden sm:inline" style="color: var(--docs-text-muted);" {{ $classAttr }}="{ 'text-indigo-600': currentStep === 0 }">Account</span>
                                    </button>
                                </li>
                                <li class="hidden sm:block"><div {{ $classAttr }}="{ 'bg-indigo-600': currentStep > 0 }" class="h-0.5 w-8 sm:w-12 transition-colors" style="background: var(--docs-bg-alt);"></div></li>
                                <li>
                                    <button type="button" @click="set('currentStep', 1)" class="flex items-center">
                                        <span {{ $classAttr }}="{ 'bg-indigo-600': currentStep >= 1, 'text-white': currentStep >= 1 }" class="flex h-8 w-8 items-center justify-center rounded-full transition-colors text-sm font-medium" style="background: var(--docs-bg-alt); color: var(--docs-text-muted);">2</span>
                                        <span class="ms-2 sm:ms-3 text-sm font-medium hidden sm:inline" style="color: var(--docs-text-muted);" {{ $classAttr }}="{ 'text-indigo-600': currentStep === 1 }">Profile</span>
                                    </button>
                                </li>
                                <li class="hidden sm:block"><div {{ $classAttr }}="{ 'bg-indigo-600': currentStep > 1 }" class="h-0.5 w-8 sm:w-12 transition-colors" style="background: var(--docs-bg-alt);"></div></li>
                                <li>
                                    <button type="button" @click="set('currentStep', 2)" class="flex items-center">
                                        <span {{ $classAttr }}="{ 'bg-indigo-600': currentStep >= 2, 'text-white': currentStep >= 2 }" class="flex h-8 w-8 items-center justify-center rounded-full transition-colors text-sm font-medium" style="background: var(--docs-bg-alt); color: var(--docs-text-muted);">3</span>
                                        <span class="ms-2 sm:ms-3 text-sm font-medium hidden sm:inline" style="color: var(--docs-text-muted);" {{ $classAttr }}="{ 'text-indigo-600': currentStep === 2 }">Confirm</span>
                                    </button>
                                </li>
                            </ol>
                        </nav>
                    </div>

                    <!-- Step content -->
                    <div class="p-4 sm:p-6">
                        <!-- Step 1: Account -->
                        <div {{ $showAttr }}="currentStep === 0">
                            <h5 class="font-medium mb-4" style="color: var(--docs-text);">Create your account</h5>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium mb-1" style="color: var(--docs-text);">Email</label>
                                    <input type="email" placeholder="you@example.com" class="w-full px-3 py-2 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg); color: var(--docs-text);">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1" style="color: var(--docs-text);">Password</label>
                                    <input type="password" placeholder="********" class="w-full px-3 py-2 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg); color: var(--docs-text);">
                                </div>
                            </div>
                        </div>

                        <!-- Step 2: Profile -->
                        <div {{ $showAttr }}="currentStep === 1">
                            <h5 class="font-medium mb-4" style="color: var(--docs-text);">Tell us about yourself</h5>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium mb-1" style="color: var(--docs-text);">First Name</label>
                                    <input type="text" placeholder="John" class="w-full px-3 py-2 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg); color: var(--docs-text);">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1" style="color: var(--docs-text);">Last Name</label>
                                    <input type="text" placeholder="Doe" class="w-full px-3 py-2 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg); color: var(--docs-text);">
                                </div>
                                <div class="sm:col-span-2">
                                    <label class="block text-sm font-medium mb-1" style="color: var(--docs-text);">Bio</label>
                                    <textarea rows="2" placeholder="Tell us about yourself..." class="w-full px-3 py-2 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg); color: var(--docs-text);"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Step 3: Confirm -->
                        <div {{ $showAttr }}="currentStep === 2">
                            <h5 class="font-medium mb-4" style="color: var(--docs-text);">Review and confirm</h5>
                            <div class="p-4 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
                                <p class="text-sm" style="color: var(--docs-text-muted);">
                                    Please review your information before submitting. You can go back to previous steps to make changes.
                                </p>
                                <div class="mt-4 space-y-2">
                                    <div class="flex items-center gap-2">
                                        <input type="checkbox" id="terms-demo" class="rounded border-[var(--docs-border)] text-indigo-600 focus:ring-indigo-500">
                                        <label for="terms-demo" class="text-sm" style="color: var(--docs-text);">I agree to the Terms of Service</label>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <input type="checkbox" id="newsletter-demo" class="rounded border-[var(--docs-border)] text-indigo-600 focus:ring-indigo-500">
                                        <label for="newsletter-demo" class="text-sm" style="color: var(--docs-text);">Subscribe to newsletter</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <div class="flex items-center justify-between border-t border-[var(--docs-border)] px-4 sm:px-6 py-4">
                        <button type="button" {{ $showAttr }}="currentStep > 0" @click="set('currentStep', currentStep - 1)" class="inline-flex items-center gap-2 rounded-lg border border-[var(--docs-border)] px-3 sm:px-4 py-2 text-sm font-medium shadow-sm" style="background: var(--docs-bg); color: var(--docs-text);">
                            <svg class="h-4 w-4 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
                            <span class="hidden sm:inline">Previous</span>
                        </button>
                        <div {{ $showAttr }}="currentStep === 0"></div>
                        <button type="button" {{ $showAttr }}="currentStep < totalSteps - 1" @click="set('currentStep', currentStep + 1)" class="inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-3 sm:px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-500">
                            <span class="hidden sm:inline">Next</span>
                            <svg class="h-4 w-4 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
                        </button>
                        <button type="submit" {{ $showAttr }}="currentStep === totalSteps - 1" class="inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-3 sm:px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-500">
                            <span class="hidden sm:inline">Submit</span>
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                        </button>
                    </div>
                </div>
            </x-accelade::data>
        </div>

        <!-- Skippable Wizard -->
        <div class="rounded-xl p-4 border border-indigo-500/30" style="background: rgba(99, 102, 241, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-indigo-500/20 text-indigo-500 rounded">Skippable</span>
                Non-Linear Navigation
            </h4>
            <p class="text-sm mb-3" style="color: var(--docs-text-muted);">
                Set <code class="px-1 rounded border border-[var(--docs-border)]" style="background: var(--docs-bg); color: var(--docs-text);">skippable</code> to allow jumping to any step directly.
            </p>

            <x-accelade::data :default="['currentStep' => 0]">
                <div class="rounded-xl shadow-sm ring-1 ring-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <div class="border-b border-[var(--docs-border)]">
                        <nav class="flex justify-center px-4 sm:px-6 py-4 overflow-x-auto">
                            <ol class="flex items-center gap-4 sm:gap-8">
                                @foreach(['Shipping', 'Payment', 'Review'] as $index => $label)
                                    <li>
                                        <button type="button" @click="set('currentStep', {{ $index }})" class="flex items-center cursor-pointer">
                                            <span {{ $classAttr }}="{ 'bg-indigo-500': currentStep === {{ $index }}, 'text-white': currentStep === {{ $index }} }" class="flex h-8 w-8 items-center justify-center rounded-full transition-colors text-sm font-medium" style="background: var(--docs-bg-alt); color: var(--docs-text-muted);">
                                                {{ $index + 1 }}
                                            </span>
                                            <span class="ms-2 text-sm font-medium hidden sm:inline" style="color: var(--docs-text);" {{ $classAttr }}="{ 'text-indigo-600': currentStep === {{ $index }} }">{{ $label }}</span>
                                        </button>
                                    </li>
                                @endforeach
                            </ol>
                        </nav>
                    </div>
                    <div class="p-4 sm:p-6">
                        <div {{ $showAttr }}="currentStep === 0" class="text-center p-4" style="color: var(--docs-text-muted);">Shipping address form...</div>
                        <div {{ $showAttr }}="currentStep === 1" class="text-center p-4" style="color: var(--docs-text-muted);">Payment method selection...</div>
                        <div {{ $showAttr }}="currentStep === 2" class="text-center p-4" style="color: var(--docs-text-muted);">Order review and confirmation...</div>
                    </div>
                </div>
            </x-accelade::data>
        </div>
    </div>

    <!-- Props Table -->
    <div class="rounded-xl p-4 border border-[var(--docs-border)] mb-4 overflow-x-auto" style="background: var(--docs-bg);">
        <h4 class="font-medium mb-4" style="color: var(--docs-text);">Component Props</h4>
        <div class="overflow-x-auto">
            <table class="w-full text-sm min-w-[500px]">
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
                        <td class="py-2 px-3"><code class="text-purple-500">startStep</code></td>
                        <td class="py-2 px-3">int</td>
                        <td class="py-2 px-3">0</td>
                        <td class="py-2 px-3">Initial step index (0-based)</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-purple-500">skippable</code></td>
                        <td class="py-2 px-3">bool</td>
                        <td class="py-2 px-3">false</td>
                        <td class="py-2 px-3">Allow jumping to any step</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-purple-500">nextLabel</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">"Next"</td>
                        <td class="py-2 px-3">Next button label</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-purple-500">previousLabel</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">"Previous"</td>
                        <td class="py-2 px-3">Previous button label</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-3"><code class="text-purple-500">submitLabel</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">"Submit"</td>
                        <td class="py-2 px-3">Final step submit button label</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h5 class="font-medium mt-4 mb-2" style="color: var(--docs-text);">Step Props</h5>
        <div class="overflow-x-auto">
            <table class="w-full text-sm min-w-[400px]">
                <thead>
                    <tr class="border-b border-[var(--docs-border)]">
                        <th class="text-start py-2 px-3" style="color: var(--docs-text-muted);">Prop</th>
                        <th class="text-start py-2 px-3" style="color: var(--docs-text-muted);">Type</th>
                        <th class="text-start py-2 px-3" style="color: var(--docs-text-muted);">Description</th>
                    </tr>
                </thead>
                <tbody style="color: var(--docs-text-muted);">
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-purple-500">label</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">Step indicator label</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-purple-500">description</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">Optional step description</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-purple-500">icon</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">HTML icon (replaces step number)</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-3"><code class="text-purple-500">columns</code></td>
                        <td class="py-2 px-3">int|array</td>
                        <td class="py-2 px-3">Grid columns for step content</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <x-accelade::code-block language="php" filename="wizard-example.php">
use Accelade\Schemas\Components\Wizard;
use Accelade\Schemas\Components\Step;

Wizard::make()
    ->steps([
        Step::make('account')
            ->label('Account')
            ->description('Create your account')
            ->schema([
                TextInput::make('email')->email()->required(),
                TextInput::make('password')->password()->required(),
            ]),

        Step::make('profile')
            ->label('Profile')
            ->columns(2)
            ->schema([
                TextInput::make('first_name'),
                TextInput::make('last_name'),
            ]),

        Step::make('confirm')
            ->label('Confirm')
            ->schema([
                Checkbox::make('terms')->required(),
            ]),
    ])
    ->skippable()
    ->nextLabel('Continue')
    ->submitLabel('Create Account');
    </x-accelade::code-block>
</section>
