<?php

declare(strict_types=1);

namespace Accelade\Schemas\Components;

use Accelade\Schemas\Component;
use Closure;

/**
 * Image component for displaying images.
 *
 * Supports custom dimensions, alignment, and tooltips.
 */
class Image extends Component
{
    protected string|Closure|null $url = null;

    protected string|Closure|null $alt = null;

    protected string|Closure|null $width = null;

    protected string|Closure|null $height = null;

    protected string|Closure $alignment = 'start';

    protected string|Closure|null $tooltip = null;

    protected bool|Closure $rounded = false;

    protected bool|Closure $circular = false;

    /**
     * Create a new Image instance.
     *
     * For the Filament-style API with url and alt, use:
     * Image::make()->url($url)->alt($alt)
     */
    public static function make(?string $name = null): static
    {
        $instance = new static;
        $instance->name = $name ?? '';
        $instance->url = $name;
        $instance->setUp();

        return $instance;
    }

    /**
     * Set the image URL.
     */
    public function url(string|Closure $url): static
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the URL.
     */
    public function getUrl(): ?string
    {
        return $this->evaluate($this->url);
    }

    /**
     * Set the alt text.
     */
    public function alt(string|Closure $alt): static
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get the alt text.
     */
    public function getAlt(): ?string
    {
        return $this->evaluate($this->alt);
    }

    /**
     * Set the image width.
     */
    public function imageWidth(string|Closure $width): static
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get the width.
     */
    public function getWidth(): ?string
    {
        return $this->evaluate($this->width);
    }

    /**
     * Set the image height.
     */
    public function imageHeight(string|Closure $height): static
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get the height.
     */
    public function getHeight(): ?string
    {
        return $this->evaluate($this->height);
    }

    /**
     * Set both width and height.
     */
    public function imageSize(string|Closure $size): static
    {
        $this->width = $size;
        $this->height = $size;

        return $this;
    }

    /**
     * Set the alignment.
     */
    public function alignment(string|Closure $alignment): static
    {
        $this->alignment = $alignment;

        return $this;
    }

    /**
     * Align to start.
     */
    public function alignStart(): static
    {
        return $this->alignment('start');
    }

    /**
     * Align to center.
     */
    public function alignCenter(): static
    {
        return $this->alignment('center');
    }

    /**
     * Align to end.
     */
    public function alignEnd(): static
    {
        return $this->alignment('end');
    }

    /**
     * Get the alignment.
     */
    public function getAlignment(): string
    {
        return $this->evaluate($this->alignment);
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
     * Make image rounded.
     */
    public function rounded(bool|Closure $rounded = true): static
    {
        $this->rounded = $rounded;

        return $this;
    }

    /**
     * Check if rounded.
     */
    public function isRounded(): bool
    {
        return (bool) $this->evaluate($this->rounded);
    }

    /**
     * Make image circular.
     */
    public function circular(bool|Closure $circular = true): static
    {
        $this->circular = $circular;

        return $this;
    }

    /**
     * Check if circular.
     */
    public function isCircular(): bool
    {
        return (bool) $this->evaluate($this->circular);
    }

    /**
     * Get the view name.
     */
    protected function getView(): string
    {
        return 'schemas::components.image';
    }

    /**
     * Convert to array.
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'url' => $this->getUrl(),
            'alt' => $this->getAlt(),
            'width' => $this->getWidth(),
            'height' => $this->getHeight(),
            'alignment' => $this->getAlignment(),
            'tooltip' => $this->getTooltip(),
            'rounded' => $this->isRounded(),
            'circular' => $this->isCircular(),
        ]);
    }
}
