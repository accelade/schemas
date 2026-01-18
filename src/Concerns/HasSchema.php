<?php

declare(strict_types=1);

namespace Accelade\Schemas\Concerns;

use Accelade\Schemas\Contracts\HasRecord;
use Illuminate\Contracts\Support\Htmlable;

/**
 * Trait for components that can contain child components.
 */
trait HasSchema
{
    protected array $schema = [];

    /**
     * Set child components.
     *
     * @param  array<Htmlable>  $components
     */
    public function schema(array $components): static
    {
        $this->schema = $components;

        return $this;
    }

    /**
     * Get child components.
     */
    public function getSchema(): array
    {
        return $this->schema;
    }

    /**
     * Get visible child components (filter out hidden ones).
     * This also passes the record to children that support it.
     */
    public function getVisibleSchema(): array
    {
        $record = method_exists($this, 'getRecord') ? $this->getRecord() : null;

        return array_values(array_filter(
            array_map(function ($component) use ($record) {
                // Pass record to children that support it
                if ($record !== null && $component instanceof HasRecord) {
                    $component->record($record);
                }

                return $component;
            }, $this->schema),
            function ($component): bool {
                if (method_exists($component, 'isHidden')) {
                    return ! $component->isHidden();
                }

                return true;
            }
        ));
    }

    /**
     * Check if the component has child components.
     */
    public function hasSchema(): bool
    {
        return ! empty($this->schema);
    }
}
