<?php

declare(strict_types=1);

namespace Accelade\Schemas\Components;

use Accelade\Schemas\Component;
use Accelade\Schemas\Concerns\CanBeCollapsible;
use Accelade\Schemas\Concerns\HasColumns;
use Accelade\Schemas\Concerns\HasSchema;
use Closure;

/**
 * Section component for grouping content with optional heading and collapsibility.
 */
class Section extends Component
{
    use CanBeCollapsible;
    use HasColumns;
    use HasSchema;

    protected string|Closure|null $heading = null;

    protected string|Closure|null $description = null;

    protected string|Closure|null $icon = null;

    protected bool $aside = false;

    protected bool $compact = false;

    /**
     * Set up the component.
     */
    protected function setUp(): void
    {
        // Auto-set heading from name if name is provided
        if ($this->name && $this->name !== 'section') {
            $this->heading = $this->name;
        }

        // Auto-generate ID from name
        if (! $this->id && $this->name) {
            $this->id = $this->generateIdFromName($this->name);
        }
    }

    /**
     * Generate a snake_case ID from the name.
     */
    protected function generateIdFromName(string $name): string
    {
        $cleaned = preg_replace('/^(?:__|trans)\([\'"](.+?)[\'"]\)$/', '$1', $name);
        $snakeCase = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '_', $cleaned));

        return trim($snakeCase, '_');
    }

    /**
     * Set the section heading.
     */
    public function heading(string|Closure $heading): static
    {
        $this->heading = $heading;

        return $this;
    }

    /**
     * Get the heading.
     */
    public function getHeading(): ?string
    {
        return $this->evaluate($this->heading);
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
     * Display the section as an aside (sidebar style).
     */
    public function aside(bool $condition = true): static
    {
        $this->aside = $condition;

        return $this;
    }

    /**
     * Check if aside mode.
     */
    public function isAside(): bool
    {
        return $this->aside;
    }

    /**
     * Use compact styling.
     */
    public function compact(bool $condition = true): static
    {
        $this->compact = $condition;

        return $this;
    }

    /**
     * Check if compact mode.
     */
    public function isCompact(): bool
    {
        return $this->compact;
    }

    /**
     * Get the view name.
     */
    protected function getView(): string
    {
        return 'schemas::components.section';
    }

    /**
     * Convert to array.
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'heading' => $this->getHeading(),
            'description' => $this->getDescription(),
            'icon' => $this->getIcon(),
            'columns' => $this->getColumns(),
            'collapsible' => $this->isCollapsible(),
            'collapsed' => $this->isCollapsed(),
            'aside' => $this->isAside(),
            'compact' => $this->isCompact(),
        ]);
    }
}
