<?php

declare(strict_types=1);

namespace Accelade\Schemas\Components;

use Accelade\Schemas\Component;
use Accelade\Schemas\Concerns\HasSchema;

/**
 * Split component for two-column layouts with customizable ratios.
 */
class Split extends Component
{
    use HasSchema;

    protected string $from = 'md';

    protected string $leftWidth = '1/2';

    protected string $rightWidth = '1/2';

    protected string $gap = '4';

    /**
     * Set the breakpoint to split from.
     */
    public function from(string $breakpoint): static
    {
        $this->from = $breakpoint;

        return $this;
    }

    /**
     * Get the from breakpoint.
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * Set the left column width (e.g., '1/3', '2/3', '1/2').
     */
    public function leftWidth(string $width): static
    {
        $this->leftWidth = $width;

        return $this;
    }

    /**
     * Get the left width.
     */
    public function getLeftWidth(): string
    {
        return $this->leftWidth;
    }

    /**
     * Set the right column width.
     */
    public function rightWidth(string $width): static
    {
        $this->rightWidth = $width;

        return $this;
    }

    /**
     * Get the right width.
     */
    public function getRightWidth(): string
    {
        return $this->rightWidth;
    }

    /**
     * Set the gap between columns.
     */
    public function gap(string|int $gap): static
    {
        $this->gap = (string) $gap;

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
     * Get CSS class for width value.
     */
    protected function widthToClass(string $width, string $prefix = ''): string
    {
        $mapping = [
            '1/2' => 'w-1/2',
            '1/3' => 'w-1/3',
            '2/3' => 'w-2/3',
            '1/4' => 'w-1/4',
            '3/4' => 'w-3/4',
            '1/5' => 'w-1/5',
            '2/5' => 'w-2/5',
            '3/5' => 'w-3/5',
            '4/5' => 'w-4/5',
            'full' => 'w-full',
            'auto' => 'w-auto',
        ];

        $class = $mapping[$width] ?? "w-[{$width}]";

        return $prefix ? "{$prefix}:{$class}" : $class;
    }

    /**
     * Get the left column classes.
     */
    public function getLeftClasses(): string
    {
        return 'w-full '.$this->widthToClass($this->leftWidth, $this->from);
    }

    /**
     * Get the right column classes.
     */
    public function getRightClasses(): string
    {
        return 'w-full '.$this->widthToClass($this->rightWidth, $this->from);
    }

    /**
     * Get the view name.
     */
    protected function getView(): string
    {
        return 'schemas::components.split';
    }

    /**
     * Convert to array.
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'from' => $this->from,
            'leftWidth' => $this->leftWidth,
            'rightWidth' => $this->rightWidth,
            'gap' => $this->gap,
        ]);
    }
}
