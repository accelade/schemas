<?php

declare(strict_types=1);

namespace Accelade\Schemas\Components;

use Accelade\Schemas\Component;
use Accelade\Schemas\Concerns\HasColumns;
use Accelade\Schemas\Concerns\HasSchema;
use Closure;

/**
 * Step component for use within Wizard.
 */
class Step extends Component
{
    use HasColumns;
    use HasSchema;

    protected string|Closure|null $description = null;

    protected string|Closure|null $icon = null;

    /**
     * Set up the component.
     */
    protected function setUp(): void
    {
        // Auto-set label from name
        if ($this->name) {
            $this->label = $this->name;
        }

        // Auto-generate ID from name
        if (! $this->id && $this->name) {
            $this->id = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $this->name));
        }
    }

    /**
     * Set the description.
     */
    public function description(string|Closure $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the description.
     */
    public function getDescription(): ?string
    {
        return $this->evaluate($this->description);
    }

    /**
     * Set the icon.
     */
    public function icon(string|Closure $icon): static
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get the icon.
     */
    public function getIcon(): ?string
    {
        return $this->evaluate($this->icon);
    }

    /**
     * Get the view name.
     */
    protected function getView(): string
    {
        return 'schemas::components.step';
    }

    /**
     * Convert to array.
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'description' => $this->getDescription(),
            'icon' => $this->getIcon(),
            'columns' => $this->getColumns(),
        ]);
    }
}
