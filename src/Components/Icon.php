<?php

declare(strict_types=1);

namespace Accelade\Schemas\Components;

use Accelade\Schemas\Component;
use Closure;

/**
 * Icon component for displaying SVG icons.
 *
 * Supports customizable colors, sizes, and tooltips.
 */
class Icon extends Component
{
    protected string|Closure|null $icon = null;

    protected string|Closure $color = 'neutral';

    protected string|Closure $size = 'md';

    protected string|Closure|null $tooltip = null;

    /**
     * Create a new Icon instance.
     */
    public static function make(?string $name = null): static
    {
        $instance = new static;
        $instance->name = $name ?? '';
        $instance->icon = $name;
        $instance->setUp();

        return $instance;
    }

    /**
     * Set the icon SVG or name.
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
    public function color(string|Closure $color): static
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the color.
     */
    public function getColor(): string
    {
        return $this->evaluate($this->color);
    }

    /**
     * Set the icon size.
     *
     * @param  string|Closure  $size  'xs', 'sm', 'md', 'lg', 'xl'
     */
    public function size(string|Closure $size): static
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get the size.
     */
    public function getSize(): string
    {
        return $this->evaluate($this->size);
    }

    /**
     * Set a tooltip.
     */
    public function tooltip(string|Closure $tooltip): static
    {
        $this->tooltip = $tooltip;

        return $this;
    }

    /**
     * Get the tooltip.
     */
    public function getTooltip(): ?string
    {
        return $this->evaluate($this->tooltip);
    }

    /**
     * Get the view name.
     */
    protected function getView(): string
    {
        return 'schemas::components.svg-icon';
    }

    /**
     * Convert to array.
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'icon' => $this->getIcon(),
            'color' => $this->getColor(),
            'size' => $this->getSize(),
            'tooltip' => $this->getTooltip(),
        ]);
    }
}
