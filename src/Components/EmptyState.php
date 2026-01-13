<?php

declare(strict_types=1);

namespace Accelade\Schemas\Components;

use Accelade\Schemas\Component;
use Accelade\Schemas\Concerns\HasSchema;
use Closure;

/**
 * Empty State component for communicating when no content is available.
 *
 * Displays a heading, optional description, icon, and action buttons
 * to guide users toward their next action.
 */
class EmptyState extends Component
{
    use HasSchema;

    protected string|Closure|null $heading = null;

    protected string|Closure|null $description = null;

    protected string|Closure|null $icon = null;

    protected string|Closure $iconColor = 'gray';

    protected string|Closure $iconSize = 'lg';

    protected bool $contained = true;

    /**
     * Set the heading text.
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
     * Set the description text.
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
     * Set the icon color.
     */
    public function iconColor(string|Closure $color): static
    {
        $this->iconColor = $color;

        return $this;
    }

    /**
     * Get the icon color.
     */
    public function getIconColor(): string
    {
        return $this->evaluate($this->iconColor);
    }

    /**
     * Set the icon size.
     */
    public function iconSize(string|Closure $size): static
    {
        $this->iconSize = $size;

        return $this;
    }

    /**
     * Get the icon size.
     */
    public function getIconSize(): string
    {
        return $this->evaluate($this->iconSize);
    }

    /**
     * Set contained mode.
     */
    public function contained(bool $contained = true): static
    {
        $this->contained = $contained;

        return $this;
    }

    /**
     * Check if contained.
     */
    public function isContained(): bool
    {
        return $this->contained;
    }

    /**
     * Get the view name.
     */
    protected function getView(): string
    {
        return 'schemas::components.empty-state';
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
            'iconColor' => $this->getIconColor(),
            'iconSize' => $this->getIconSize(),
            'contained' => $this->contained,
        ]);
    }
}
