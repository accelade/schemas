{{-- Custom Components Demo --}}
@props(['prefix' => 'a'])

<!-- Demo: Custom Components -->
<section class="rounded-xl p-6 mb-6 border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
    <div class="flex items-center gap-3 mb-2">
        <span class="w-2.5 h-2.5 bg-violet-500 rounded-full"></span>
        <h3 class="text-lg font-semibold" style="color: var(--docs-text);">Custom Schema Components</h3>
    </div>
    <p class="text-sm mb-6" style="color: var(--docs-text-muted);">
        Create your own schema components by extending the base <code class="px-1.5 py-0.5 rounded text-sm border border-[var(--docs-border)]" style="background: var(--docs-bg);">Component</code> class.
    </p>

    <div class="space-y-6 mb-6">
        <!-- Generate Command -->
        <div class="rounded-xl p-4 border border-violet-500/30" style="background: rgba(139, 92, 246, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-violet-500/20 text-violet-500 rounded">Command</span>
                Generate a Component
            </h4>

            <x-accelade::code-block language="bash" filename="Terminal">
php artisan accelade:schema-component Chart
            </x-accelade::code-block>

            <p class="text-sm mt-3" style="color: var(--docs-text-muted);">
                This creates two files:
            </p>
            <ul class="mt-2 text-sm space-y-1" style="color: var(--docs-text-muted);">
                <li><code class="px-1 rounded border border-[var(--docs-border)]" style="background: var(--docs-bg);">app/Schemas/Components/Chart.php</code> - Component class</li>
                <li><code class="px-1 rounded border border-[var(--docs-border)]" style="background: var(--docs-bg);">resources/views/schemas/components/chart.blade.php</code> - Blade view</li>
            </ul>
        </div>

        <!-- Component Structure -->
        <div class="rounded-xl p-4 border border-emerald-500/30" style="background: rgba(16, 185, 129, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-emerald-500/20 text-emerald-500 rounded">Structure</span>
                Component Class
            </h4>

            <x-accelade::code-block language="php" filename="app/Schemas/Components/Chart.php">
namespace App\Schemas\Components;

use Accelade\Schemas\Component;
use Accelade\Schemas\Concerns\HasSchema;
use Closure;

class Chart extends Component
{
    use HasSchema;

    protected string|Closure|null $chartType = 'bar';
    protected array|Closure $data = [];

    public static function make(?string $name = null): static
    {
        $static = new static;
        $static->name = $name ?? '';
        $static->setUp();

        return $static;
    }

    public function type(string|Closure $chartType): static
    {
        $this->chartType = $chartType;
        return $this;
    }

    public function getType(): string
    {
        return $this->evaluate($this->chartType) ?? 'bar';
    }

    protected function getView(): string
    {
        return 'schemas.components.chart';
    }
}
            </x-accelade::code-block>
        </div>

        <!-- Closure Support -->
        <div class="rounded-xl p-4 border border-amber-500/30" style="background: rgba(245, 158, 11, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-amber-500/20 text-amber-500 rounded">Closures</span>
                Dynamic Configuration
            </h4>

            <p class="text-sm mb-3" style="color: var(--docs-text-muted);">
                Use closures for dynamic values. The <code class="px-1 rounded border border-[var(--docs-border)]" style="background: var(--docs-bg);">evaluate()</code> method resolves them with Laravel's container:
            </p>

            <x-accelade::code-block language="php" filename="Usage Example">
use App\Schemas\Components\Chart;

Chart::make('Sales Report')
    -&gt;type('line')
    -&gt;data(fn () =&gt; Order::query()
        -&gt;selectRaw('DATE(created_at) as date, SUM(total) as total')
        -&gt;groupBy('date')
        -&gt;get()
        -&gt;toArray()
    );
            </x-accelade::code-block>
        </div>

        <!-- Available Traits -->
        <div class="rounded-xl p-4 border border-indigo-500/30" style="background: rgba(99, 102, 241, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-indigo-500/20 text-indigo-500 rounded">Traits</span>
                Reusable Concerns
            </h4>

            <p class="text-sm mb-3" style="color: var(--docs-text-muted);">
                Extend your component with built-in traits:
            </p>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-[var(--docs-border)]">
                            <th class="text-start py-2 px-3" style="color: var(--docs-text-muted);">Trait</th>
                            <th class="text-start py-2 px-3" style="color: var(--docs-text-muted);">Description</th>
                        </tr>
                    </thead>
                    <tbody style="color: var(--docs-text-muted);">
                        <tr class="border-b border-[var(--docs-border)]">
                            <td class="py-2 px-3"><code class="text-indigo-500">HasSchema</code></td>
                            <td class="py-2 px-3">Allows nesting child components via <code class="px-1 rounded" style="background: var(--docs-bg);">schema([])</code></td>
                        </tr>
                        <tr class="border-b border-[var(--docs-border)]">
                            <td class="py-2 px-3"><code class="text-indigo-500">HasColumns</code></td>
                            <td class="py-2 px-3">Adds responsive column configuration</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-3"><code class="text-indigo-500">CanBeCollapsible</code></td>
                            <td class="py-2 px-3">Adds collapse/expand functionality</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <x-accelade::code-block language="php" filename="Using Multiple Traits" class="mt-4">
use Accelade\Schemas\Component;
use Accelade\Schemas\Concerns\HasSchema;
use Accelade\Schemas\Concerns\HasColumns;
use Accelade\Schemas\Concerns\CanBeCollapsible;

class CustomCard extends Component
{
    use HasSchema;
    use HasColumns;
    use CanBeCollapsible;

    // Your component now supports:
    // -&gt;schema([...])
    // -&gt;columns(2)
    // -&gt;collapsible()
    // -&gt;collapsed()
}
            </x-accelade::code-block>
        </div>

        <!-- View Data -->
        <div class="rounded-xl p-4 border border-rose-500/30" style="background: rgba(244, 63, 94, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-rose-500/20 text-rose-500 rounded">Views</span>
                Blade View Data
            </h4>

            <p class="text-sm mb-3" style="color: var(--docs-text-muted);">
                Pass data to your view by overriding <code class="px-1 rounded border border-[var(--docs-border)]" style="background: var(--docs-bg);">getViewData()</code>:
            </p>

            <x-accelade::code-block language="php" filename="getViewData()">
protected function getViewData(): array
{
    return array_merge(parent::getViewData(), [
        'chartType' =&gt; $this-&gt;getType(),
        'chartData' =&gt; $this-&gt;getData(),
    ]);
}
            </x-accelade::code-block>

            <x-accelade::code-block language="blade" filename="chart.blade.php" class="mt-4">
&lt;div class="chart-component"&gt;
    &lt;div
        data-chart-type="@{{ $chartType }}"
        data-chart-data="@{{ json_encode($chartData) }}"
    &gt;
        {{-- Chart renders here --}}
    &lt;/div&gt;
&lt;/div&gt;
            </x-accelade::code-block>
        </div>
    </div>

    <!-- Base Component Methods -->
    <div class="rounded-xl p-4 border border-[var(--docs-border)] mb-4" style="background: var(--docs-bg);">
        <h4 class="font-medium mb-4" style="color: var(--docs-text);">Inherited Base Methods</h4>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-[var(--docs-border)]">
                        <th class="text-start py-2 px-3" style="color: var(--docs-text-muted);">Method</th>
                        <th class="text-start py-2 px-3" style="color: var(--docs-text-muted);">Description</th>
                    </tr>
                </thead>
                <tbody style="color: var(--docs-text-muted);">
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-violet-500">make(?string $name)</code></td>
                        <td class="py-2 px-3">Static factory method to create instances</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-violet-500">id(string $id)</code></td>
                        <td class="py-2 px-3">Set HTML id attribute</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-violet-500">label(string|Closure $label)</code></td>
                        <td class="py-2 px-3">Set component label</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-violet-500">hidden(bool $condition)</code></td>
                        <td class="py-2 px-3">Conditionally hide the component</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-violet-500">visible(bool $condition)</code></td>
                        <td class="py-2 px-3">Conditionally show the component</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-violet-500">extraAttributes(array $attrs)</code></td>
                        <td class="py-2 px-3">Add extra HTML attributes</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-violet-500">evaluate(mixed $value)</code></td>
                        <td class="py-2 px-3">Resolve closures with DI container</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-3"><code class="text-violet-500">render()</code></td>
                        <td class="py-2 px-3">Render component to HTML string</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <x-accelade::code-block language="php" filename="complete-example.php">
namespace App\Schemas\Components;

use Accelade\Schemas\Component;
use Accelade\Schemas\Concerns\HasSchema;
use Accelade\Schemas\Concerns\CanBeCollapsible;
use Closure;

class StatCard extends Component
{
    use HasSchema;
    use CanBeCollapsible;

    protected string|Closure|null $value = null;
    protected string|Closure|null $description = null;
    protected string $color = 'primary';

    public static function make(?string $name = null): static
    {
        $static = new static;
        $static-&gt;name = $name ?? '';
        $static-&gt;setUp();

        return $static;
    }

    public function value(string|Closure $value): static
    {
        $this-&gt;value = $value;
        return $this;
    }

    public function getValue(): ?string
    {
        return $this-&gt;evaluate($this-&gt;value);
    }

    public function description(string|Closure $description): static
    {
        $this-&gt;description = $description;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this-&gt;evaluate($this-&gt;description);
    }

    public function color(string $color): static
    {
        $this-&gt;color = $color;
        return $this;
    }

    public function getColor(): string
    {
        return $this-&gt;color;
    }

    protected function getView(): string
    {
        return 'schemas.components.stat-card';
    }

    protected function getViewData(): array
    {
        return array_merge(parent::getViewData(), [
            'value' =&gt; $this-&gt;getValue(),
            'description' =&gt; $this-&gt;getDescription(),
            'color' =&gt; $this-&gt;getColor(),
        ]);
    }
}

// Usage:
StatCard::make('Total Revenue')
    -&gt;value(fn () =&gt; '$' . number_format(Order::sum('total'), 2))
    -&gt;description('+12% from last month')
    -&gt;color('success')
    -&gt;collapsible();
    </x-accelade::code-block>
</section>
