<?php

declare(strict_types=1);

namespace Accelade\Schemas\Concerns;

/**
 * Trait for components that support column layouts.
 */
trait HasColumns
{
    protected int|array $columns = 1;

    /**
     * Set number of columns.
     *
     * @param  int|array  $columns  Number of columns or responsive array [default => 1, sm => 2, md => 3, lg => 4]
     */
    public function columns(int|array $columns): static
    {
        $this->columns = $columns;

        return $this;
    }

    /**
     * Get columns configuration.
     */
    public function getColumns(): int|array
    {
        return $this->columns;
    }

    /**
     * Get CSS classes for grid columns.
     */
    public function getColumnClasses(): string
    {
        if (is_int($this->columns)) {
            return match ($this->columns) {
                1 => 'grid-cols-1',
                2 => 'grid-cols-1 sm:grid-cols-2',
                3 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
                4 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4',
                5 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-5',
                6 => 'grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6',
                default => "grid-cols-{$this->columns}",
            };
        }

        // Handle responsive array configuration
        $classes = [];
        foreach ($this->columns as $breakpoint => $cols) {
            if ($breakpoint === 'default' || $breakpoint === '') {
                $classes[] = "grid-cols-{$cols}";
            } else {
                $classes[] = "{$breakpoint}:grid-cols-{$cols}";
            }
        }

        return implode(' ', $classes);
    }
}
