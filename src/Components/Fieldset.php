<?php

declare(strict_types=1);

namespace Accelade\Schemas\Components;

use Accelade\Schemas\Component;
use Accelade\Schemas\Concerns\HasColumns;
use Accelade\Schemas\Concerns\HasSchema;
use Closure;

/**
 * Fieldset component for grouping related fields with a legend.
 */
class Fieldset extends Component
{
    use HasColumns;
    use HasSchema;

    protected string|Closure|null $legend = null;

    /**
     * Set up the component.
     */
    protected function setUp(): void
    {
        // Auto-set legend from name
        if ($this->name) {
            $this->legend = $this->name;
        }
    }

    /**
     * Set the legend text.
     */
    public function legend(string|Closure $legend): static
    {
        $this->legend = $legend;

        return $this;
    }

    /**
     * Alias for legend().
     */
    public function label(string|Closure $label): static
    {
        return $this->legend($label);
    }

    /**
     * Get the legend.
     */
    public function getLegend(): ?string
    {
        return $this->evaluate($this->legend);
    }

    /**
     * Get the view name.
     */
    protected function getView(): string
    {
        return 'schemas::components.fieldset';
    }

    /**
     * Convert to array.
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'legend' => $this->getLegend(),
            'columns' => $this->getColumns(),
        ]);
    }
}
