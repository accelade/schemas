<?php

declare(strict_types=1);

namespace Accelade\Schemas\Concerns;

/**
 * Trait for components that can be collapsed/expanded.
 */
trait CanBeCollapsible
{
    protected bool $collapsible = false;

    protected bool $collapsed = false;

    protected bool $persistCollapsed = false;

    /**
     * Make the component collapsible.
     */
    public function collapsible(bool $condition = true): static
    {
        $this->collapsible = $condition;

        return $this;
    }

    /**
     * Check if collapsible.
     */
    public function isCollapsible(): bool
    {
        return $this->collapsible;
    }

    /**
     * Set initial collapsed state.
     */
    public function collapsed(bool $condition = true): static
    {
        $this->collapsed = $condition;
        $this->collapsible = true; // Must be collapsible to be collapsed

        return $this;
    }

    /**
     * Check if initially collapsed.
     */
    public function isCollapsed(): bool
    {
        return $this->collapsed;
    }

    /**
     * Persist collapsed state in local storage.
     */
    public function persistCollapsed(bool $condition = true): static
    {
        $this->persistCollapsed = $condition;

        return $this;
    }

    /**
     * Check if collapsed state should be persisted.
     */
    public function shouldPersistCollapsed(): bool
    {
        return $this->persistCollapsed;
    }
}
