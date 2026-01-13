<?php

declare(strict_types=1);

namespace Accelade\Schemas\Components;

use Accelade\Schemas\Component;
use Closure;

/**
 * UnorderedList component for displaying bullet point lists.
 *
 * Items can be strings or Text components for rich formatting.
 */
class UnorderedList extends Component
{
    /** @var array<int, string|Text>|Closure */
    protected array|Closure $items = [];

    protected string|Closure $size = 'md';

    protected string|Closure $color = 'neutral';

    protected string|Closure $bulletColor = 'neutral';

    /**
     * Create a new UnorderedList instance.
     *
     * @param  array<int, string|Text>|Closure  $items
     */
    public static function make(array|Closure $items = []): static
    {
        $instance = new static;
        $instance->items = $items;

        return $instance;
    }

    /**
     * Set the list items.
     *
     * @param  array<int, string|Text>|Closure  $items
     */
    public function items(array|Closure $items): static
    {
        $this->items = $items;

        return $this;
    }

    /**
     * Get the items.
     *
     * @return array<int, string|Text>
     */
    public function getItems(): array
    {
        return $this->evaluate($this->items);
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
     * Set the bullet color.
     */
    public function bulletColor(string|Closure $color): static
    {
        $this->bulletColor = $color;

        return $this;
    }

    /**
     * Get the bullet color.
     */
    public function getBulletColor(): string
    {
        return $this->evaluate($this->bulletColor);
    }

    /**
     * Get the view name.
     */
    protected function getView(): string
    {
        return 'schemas::components.unordered-list';
    }

    /**
     * Convert to array.
     */
    public function toArray(): array
    {
        $items = array_map(function ($item) {
            if ($item instanceof Text) {
                return $item->toArray();
            }

            return $item;
        }, $this->getItems());

        return array_merge(parent::toArray(), [
            'items' => $items,
            'size' => $this->getSize(),
            'color' => $this->getColor(),
            'bulletColor' => $this->getBulletColor(),
        ]);
    }
}
