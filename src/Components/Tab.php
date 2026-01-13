<?php

declare(strict_types=1);

namespace Accelade\Schemas\Components;

use Accelade\Schemas\Component;
use Accelade\Schemas\Concerns\HasSchema;
use Closure;

/**
 * Tab component for use within Tabs.
 */
class Tab extends Component
{
    use HasSchema;

    protected string|Closure|null $icon = null;

    protected string|Closure|null $badge = null;

    protected string|Closure|null $badgeColor = null;

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
     * Set the badge.
     */
    public function badge(string|Closure $badge): static
    {
        $this->badge = $badge;

        return $this;
    }

    /**
     * Get the badge.
     */
    public function getBadge(): ?string
    {
        return $this->evaluate($this->badge);
    }

    /**
     * Set the badge color.
     */
    public function badgeColor(string|Closure $color): static
    {
        $this->badgeColor = $color;

        return $this;
    }

    /**
     * Get the badge color.
     */
    public function getBadgeColor(): ?string
    {
        return $this->evaluate($this->badgeColor);
    }

    /**
     * Get the view name.
     */
    protected function getView(): string
    {
        return 'schemas::components.tab';
    }

    /**
     * Convert to array.
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'icon' => $this->getIcon(),
            'badge' => $this->getBadge(),
            'badgeColor' => $this->getBadgeColor(),
        ]);
    }
}
