<?php

declare(strict_types=1);

namespace Accelade\Schemas\Components;

use Accelade\Schemas\Component;
use Closure;

/**
 * Text component for displaying styled text content.
 *
 * Can be displayed as regular text or as a badge with various
 * colors, sizes, weights, and font families.
 */
class Text extends Component
{
    protected string|Closure|null $content = null;

    protected string|Closure $color = 'neutral';

    protected bool|Closure $badge = false;

    protected string|Closure $size = 'md';

    protected string|Closure $weight = 'normal';

    protected string|Closure $fontFamily = 'sans';

    protected string|Closure|null $tooltip = null;

    protected string|Closure|null $icon = null;

    protected string|Closure $iconPosition = 'before';

    protected bool|Closure $copyable = false;

    /**
     * Create a new Text instance.
     */
    public static function make(?string $name = null): static
    {
        $instance = new static;
        $instance->name = $name ?? '';
        $instance->content = $name;
        $instance->setUp();

        return $instance;
    }

    /**
     * Set the text content.
     */
    public function content(string|Closure $content): static
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the text content.
     */
    public function getContent(): ?string
    {
        return $this->evaluate($this->content);
    }

    /**
     * Set the text color.
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
     * Display as a badge.
     */
    public function badge(bool|Closure $badge = true): static
    {
        $this->badge = $badge;

        return $this;
    }

    /**
     * Check if displayed as badge.
     */
    public function isBadge(): bool
    {
        return (bool) $this->evaluate($this->badge);
    }

    /**
     * Set the text size.
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
     * Set the font weight.
     *
     * @param  string|Closure  $weight  'thin', 'extralight', 'light', 'normal', 'medium', 'semibold', 'bold', 'extrabold', 'black'
     */
    public function weight(string|Closure $weight): static
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get the weight.
     */
    public function getWeight(): string
    {
        return $this->evaluate($this->weight);
    }

    /**
     * Set the font family.
     *
     * @param  string|Closure  $fontFamily  'sans', 'serif', 'mono'
     */
    public function fontFamily(string|Closure $fontFamily): static
    {
        $this->fontFamily = $fontFamily;

        return $this;
    }

    /**
     * Get the font family.
     */
    public function getFontFamily(): string
    {
        return $this->evaluate($this->fontFamily);
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
     * Set an icon (for badge mode).
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
     * Set the icon position.
     */
    public function iconPosition(string|Closure $position): static
    {
        $this->iconPosition = $position;

        return $this;
    }

    /**
     * Get the icon position.
     */
    public function getIconPosition(): string
    {
        return $this->evaluate($this->iconPosition);
    }

    /**
     * Make the text copyable.
     */
    public function copyable(bool|Closure $copyable = true): static
    {
        $this->copyable = $copyable;

        return $this;
    }

    /**
     * Check if copyable.
     */
    public function isCopyable(): bool
    {
        return (bool) $this->evaluate($this->copyable);
    }

    /**
     * Get the view name.
     */
    protected function getView(): string
    {
        return 'schemas::components.text';
    }

    /**
     * Convert to array.
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'content' => $this->getContent(),
            'color' => $this->getColor(),
            'badge' => $this->isBadge(),
            'size' => $this->getSize(),
            'weight' => $this->getWeight(),
            'fontFamily' => $this->getFontFamily(),
            'tooltip' => $this->getTooltip(),
            'icon' => $this->getIcon(),
            'iconPosition' => $this->getIconPosition(),
            'copyable' => $this->isCopyable(),
        ]);
    }
}
