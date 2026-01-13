<?php

declare(strict_types=1);

namespace Accelade\Schemas\Components;

use Accelade\Schemas\Component;
use Accelade\Schemas\Concerns\HasSchema;
use Closure;

/**
 * Flex component for flexible width layouts using flexbox.
 *
 * Unlike Grid, Flex allows components to have variable widths based on content
 * or explicit grow/shrink settings, responding to parent container size.
 */
class Flex extends Component
{
    use HasSchema;

    protected string|Closure $from = 'md';

    protected string $gap = '4';

    protected bool|Closure $wrap = true;

    protected string $direction = 'row';

    protected string $justify = 'start';

    protected string $align = 'stretch';

    /**
     * Set the breakpoint at which the flex layout activates.
     * Below this breakpoint, items stack vertically.
     */
    public function from(string|Closure $breakpoint): static
    {
        $this->from = $breakpoint;

        return $this;
    }

    /**
     * Get the from breakpoint.
     */
    public function getFrom(): string
    {
        return $this->evaluate($this->from);
    }

    /**
     * Set the gap between flex items.
     */
    public function gap(string $gap): static
    {
        $this->gap = $gap;

        return $this;
    }

    /**
     * Get the gap.
     */
    public function getGap(): string
    {
        return $this->gap;
    }

    /**
     * Set whether flex items can wrap.
     */
    public function wrap(bool|Closure $wrap = true): static
    {
        $this->wrap = $wrap;

        return $this;
    }

    /**
     * Disable wrapping.
     */
    public function nowrap(): static
    {
        return $this->wrap(false);
    }

    /**
     * Check if wrapping is enabled.
     */
    public function canWrap(): bool
    {
        return (bool) $this->evaluate($this->wrap);
    }

    /**
     * Set the flex direction.
     */
    public function direction(string $direction): static
    {
        $this->direction = $direction;

        return $this;
    }

    /**
     * Set to column direction.
     */
    public function column(): static
    {
        return $this->direction('col');
    }

    /**
     * Set to row direction.
     */
    public function row(): static
    {
        return $this->direction('row');
    }

    /**
     * Get the direction.
     */
    public function getDirection(): string
    {
        return $this->direction;
    }

    /**
     * Set justify content.
     */
    public function justify(string $justify): static
    {
        $this->justify = $justify;

        return $this;
    }

    /**
     * Justify content to start.
     */
    public function justifyStart(): static
    {
        return $this->justify('start');
    }

    /**
     * Justify content to center.
     */
    public function justifyCenter(): static
    {
        return $this->justify('center');
    }

    /**
     * Justify content to end.
     */
    public function justifyEnd(): static
    {
        return $this->justify('end');
    }

    /**
     * Justify content with space between.
     */
    public function justifyBetween(): static
    {
        return $this->justify('between');
    }

    /**
     * Justify content with space around.
     */
    public function justifyAround(): static
    {
        return $this->justify('around');
    }

    /**
     * Get justify setting.
     */
    public function getJustify(): string
    {
        return $this->justify;
    }

    /**
     * Set align items.
     */
    public function align(string $align): static
    {
        $this->align = $align;

        return $this;
    }

    /**
     * Align items to start.
     */
    public function alignStart(): static
    {
        return $this->align('start');
    }

    /**
     * Align items to center.
     */
    public function alignCenter(): static
    {
        return $this->align('center');
    }

    /**
     * Align items to end.
     */
    public function alignEnd(): static
    {
        return $this->align('end');
    }

    /**
     * Get align setting.
     */
    public function getAlign(): string
    {
        return $this->align;
    }

    /**
     * Get the view name.
     */
    protected function getView(): string
    {
        return 'schemas::components.flex';
    }

    /**
     * Convert to array.
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'from' => $this->getFrom(),
            'gap' => $this->gap,
            'wrap' => $this->canWrap(),
            'direction' => $this->direction,
            'justify' => $this->justify,
            'align' => $this->align,
        ]);
    }
}
