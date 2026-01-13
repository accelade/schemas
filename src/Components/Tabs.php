<?php

declare(strict_types=1);

namespace Accelade\Schemas\Components;

use Accelade\Schemas\Component;

/**
 * Tabs component for tabbed content panels.
 */
class Tabs extends Component
{
    protected array $tabs = [];

    protected int|string $activeTab = 0;

    protected bool $persistInQueryString = false;

    protected string $queryStringKey = 'tab';

    protected bool $vertical = false;

    protected bool $contained = true;

    /**
     * Set tabs (array of Tab components).
     *
     * @param  array<Tab>  $tabs
     */
    public function tabs(array $tabs): static
    {
        $this->tabs = $tabs;

        return $this;
    }

    /**
     * Get tabs.
     */
    public function getTabs(): array
    {
        return $this->tabs;
    }

    /**
     * Get visible tabs.
     */
    public function getVisibleTabs(): array
    {
        return array_values(array_filter($this->tabs, function (Tab $tab): bool {
            return ! $tab->isHidden();
        }));
    }

    /**
     * Set active tab by index or ID.
     */
    public function activeTab(int|string $tab): static
    {
        $this->activeTab = $tab;

        return $this;
    }

    /**
     * Get active tab.
     */
    public function getActiveTab(): int|string
    {
        return $this->activeTab;
    }

    /**
     * Persist active tab in query string.
     */
    public function persistInQueryString(string $key = 'tab'): static
    {
        $this->persistInQueryString = true;
        $this->queryStringKey = $key;

        return $this;
    }

    /**
     * Check if persisting in query string.
     */
    public function shouldPersistInQueryString(): bool
    {
        return $this->persistInQueryString;
    }

    /**
     * Get query string key.
     */
    public function getQueryStringKey(): string
    {
        return $this->queryStringKey;
    }

    /**
     * Display tabs vertically.
     */
    public function vertical(bool $condition = true): static
    {
        $this->vertical = $condition;

        return $this;
    }

    /**
     * Check if vertical.
     */
    public function isVertical(): bool
    {
        return $this->vertical;
    }

    /**
     * Display with contained styling.
     */
    public function contained(bool $condition = true): static
    {
        $this->contained = $condition;

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
        return 'schemas::components.tabs';
    }

    /**
     * Convert to array.
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'tabs' => array_map(fn (Tab $tab) => $tab->toArray(), $this->tabs),
            'activeTab' => $this->activeTab,
            'persistInQueryString' => $this->persistInQueryString,
            'queryStringKey' => $this->queryStringKey,
            'vertical' => $this->vertical,
            'contained' => $this->contained,
        ]);
    }
}
