<?php

declare(strict_types=1);

namespace Accelade\Schemas\Components;

use Accelade\Schemas\Component;
use Accelade\Schemas\Concerns\HasColumns;
use Accelade\Schemas\Concerns\HasSchema;

/**
 * Grid component for responsive multi-column layouts.
 */
class Grid extends Component
{
    use HasColumns;
    use HasSchema;

    protected string $gap = '4';

    /**
     * Create a new Grid instance.
     * Supports both Grid::make('name') and Grid::make(2) or Grid::make(['default' => 1]).
     *
     * @param  string|int|array|null  $nameOrColumns  Either a name string or columns configuration
     */
    public static function make(string|int|array|null $nameOrColumns = null): static
    {
        $static = new static;

        // If columns are passed directly (int or array), use a default name
        if (is_int($nameOrColumns) || is_array($nameOrColumns)) {
            $static->name = 'grid';
            $static->columns = $nameOrColumns;
        } else {
            $static->name = $nameOrColumns ?? 'grid';
        }

        $static->setUp();

        return $static;
    }

    /**
     * Set the gap between grid items.
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
     * Get the view name.
     */
    protected function getView(): string
    {
        return 'schemas::components.grid';
    }

    /**
     * Convert to array.
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'columns' => $this->getColumns(),
            'gap' => $this->gap,
        ]);
    }
}
