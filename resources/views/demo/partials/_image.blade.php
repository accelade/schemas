{{-- Image Component Demo --}}
@props(['prefix' => 'a'])

<!-- Demo: Image Component -->
<section class="rounded-xl p-6 mb-6 border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
    <div class="flex items-center gap-3 mb-2">
        <span class="w-2.5 h-2.5 bg-indigo-500 rounded-full"></span>
        <h3 class="text-lg font-semibold" style="color: var(--docs-text);">Image Component</h3>
    </div>
    <p class="text-sm mb-6" style="color: var(--docs-text-muted);">
        Display images with custom dimensions, alignment, and styling using
        <code class="px-1.5 py-0.5 rounded text-sm border border-[var(--docs-border)]" style="background: var(--docs-bg);">&lt;x-accelade::image&gt;</code>.
    </p>

    <div class="space-y-6 mb-6">
        <!-- Basic Image -->
        <div class="rounded-xl p-4 border border-indigo-500/30" style="background: rgba(99, 102, 241, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-indigo-500/20 text-indigo-500 rounded">Basic</span>
                Simple Image
            </h4>

            <x-accelade::image
                url="https://picsum.photos/400/200"
                alt="Sample placeholder image"
            />
        </div>

        <!-- Custom Dimensions -->
        <div class="rounded-xl p-4 border border-emerald-500/30" style="background: rgba(16, 185, 129, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-emerald-500/20 text-emerald-500 rounded">Size</span>
                Custom Dimensions
            </h4>

            <div class="flex flex-wrap gap-4">
                <x-accelade::image
                    url="https://picsum.photos/200/200"
                    alt="Square image"
                    width="100px"
                    height="100px"
                    tooltip="100x100"
                />
                <x-accelade::image
                    url="https://picsum.photos/300/200"
                    alt="Rectangular image"
                    width="150px"
                    height="100px"
                    tooltip="150x100"
                />
                <x-accelade::image
                    url="https://picsum.photos/200/300"
                    alt="Tall image"
                    width="75px"
                    height="100px"
                    tooltip="75x100"
                />
            </div>
        </div>

        <!-- Alignment -->
        <div class="rounded-xl p-4 border border-amber-500/30" style="background: rgba(245, 158, 11, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-amber-500/20 text-amber-500 rounded">Align</span>
                Alignment Options
            </h4>

            <div class="space-y-4">
                <div class="p-3 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <p class="text-sm mb-2" style="color: var(--docs-text-muted);">Align Start (default)</p>
                    <x-accelade::image
                        url="https://picsum.photos/150/80"
                        alt="Left aligned"
                        alignment="start"
                    />
                </div>
                <div class="p-3 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <p class="text-sm mb-2" style="color: var(--docs-text-muted);">Align Center</p>
                    <x-accelade::image
                        url="https://picsum.photos/150/80"
                        alt="Center aligned"
                        alignment="center"
                    />
                </div>
                <div class="p-3 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                    <p class="text-sm mb-2" style="color: var(--docs-text-muted);">Align End</p>
                    <x-accelade::image
                        url="https://picsum.photos/150/80"
                        alt="Right aligned"
                        alignment="end"
                    />
                </div>
            </div>
        </div>

        <!-- Rounded & Circular -->
        <div class="rounded-xl p-4 border border-purple-500/30" style="background: rgba(168, 85, 247, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-purple-500/20 text-purple-500 rounded">Shapes</span>
                Border Radius Options
            </h4>

            <div class="flex flex-wrap items-center gap-6">
                <div class="text-center">
                    <x-accelade::image
                        url="https://picsum.photos/100/100"
                        alt="Default corners"
                        width="80px"
                        height="80px"
                    />
                    <p class="text-xs mt-2" style="color: var(--docs-text-muted);">Default</p>
                </div>
                <div class="text-center">
                    <x-accelade::image
                        url="https://picsum.photos/100/100"
                        alt="Rounded corners"
                        width="80px"
                        height="80px"
                        :rounded="true"
                    />
                    <p class="text-xs mt-2" style="color: var(--docs-text-muted);">Rounded</p>
                </div>
                <div class="text-center">
                    <x-accelade::image
                        url="https://picsum.photos/100/100"
                        alt="Circular image"
                        width="80px"
                        height="80px"
                        :circular="true"
                    />
                    <p class="text-xs mt-2" style="color: var(--docs-text-muted);">Circular</p>
                </div>
            </div>
        </div>

        <!-- Avatar Examples -->
        <div class="rounded-xl p-4 border border-rose-500/30" style="background: rgba(244, 63, 94, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-rose-500/20 text-rose-500 rounded">Avatars</span>
                Avatar Use Cases
            </h4>

            <div class="flex items-center gap-4">
                <x-accelade::image
                    url="https://i.pravatar.cc/100?img=1"
                    alt="User avatar"
                    width="40px"
                    height="40px"
                    :circular="true"
                    tooltip="John Doe"
                />
                <x-accelade::image
                    url="https://i.pravatar.cc/100?img=2"
                    alt="User avatar"
                    width="40px"
                    height="40px"
                    :circular="true"
                    tooltip="Jane Smith"
                />
                <x-accelade::image
                    url="https://i.pravatar.cc/100?img=3"
                    alt="User avatar"
                    width="40px"
                    height="40px"
                    :circular="true"
                    tooltip="Bob Wilson"
                />
                <x-accelade::image
                    url="https://i.pravatar.cc/100?img=4"
                    alt="User avatar"
                    width="40px"
                    height="40px"
                    :circular="true"
                    tooltip="Alice Brown"
                />
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
                        <td class="py-2 px-3"><code class="text-indigo-500">url</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">null</td>
                        <td class="py-2 px-3">Image source URL</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">alt</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">''</td>
                        <td class="py-2 px-3">Alt text for accessibility</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">width</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">null</td>
                        <td class="py-2 px-3">CSS width value (e.g., '100px', '50%')</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">height</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">null</td>
                        <td class="py-2 px-3">CSS height value</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">alignment</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">'start'</td>
                        <td class="py-2 px-3">Image alignment (start, center, end)</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">rounded</code></td>
                        <td class="py-2 px-3">bool</td>
                        <td class="py-2 px-3">false</td>
                        <td class="py-2 px-3">Apply rounded corners</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">circular</code></td>
                        <td class="py-2 px-3">bool</td>
                        <td class="py-2 px-3">false</td>
                        <td class="py-2 px-3">Make image circular</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-3"><code class="text-indigo-500">tooltip</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">null</td>
                        <td class="py-2 px-3">Tooltip text on hover</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <x-accelade::code-block language="blade" filename="image-examples.blade.php">
{{-- Basic image --}}
&lt;x-accelade::image
    url="https://example.com/photo.jpg"
    alt="Photo description"
/&gt;

{{-- Custom size --}}
&lt;x-accelade::image
    url="/images/banner.jpg"
    alt="Banner"
    width="300px"
    height="150px"
/&gt;

{{-- Circular avatar --}}
&lt;x-accelade::image
    :url="$user->avatar_url"
    :alt="$user->name"
    width="48px"
    height="48px"
    :circular="true"
    :tooltip="$user->name"
/&gt;

{{-- PHP API --}}
Image::make(url: asset('images/hero.jpg'), alt: 'Hero image')
    ->imageWidth('100%')
    ->imageHeight('400px')
    ->alignCenter()
    ->rounded();
    </x-accelade::code-block>
</section>
