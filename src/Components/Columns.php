<?php

declare(strict_types=1);

namespace Accelade\Schemas\Components;

use Accelade\Schemas\Component;
use Accelade\Schemas\Concerns\HasColumns;
use Accelade\Schemas\Concerns\HasSchema;

/**
 * Columns component for simple multi-column layouts.
 * Similar to Grid but with a focus on equal-width columns.
 */
class Columns extends Component
{
    use HasColumns;
    use HasSchema;

    protected string $gap = '4';

    /**
     * Create a new Columns instance.
     * Supports Columns::make(2) for quick creation.
     */
    public static function make(string|int|array|null $nameOrColumns = null): static
    {
        $static = new static;

        if (is_int($nameOrColumns) || is_array($nameOrColumns)) {
            $static->name = 'columns';
            $static->columns = $nameOrColumns;
        } else {
            $static->name = $nameOrColumns ?? 'columns';
        }

        $static->setUp();

        return $static;
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
     * Get the view name.
     */
    protected function getView(): string
    {
        return 'schemas::components.columns';
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
