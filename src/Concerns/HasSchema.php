<?php

declare(strict_types=1);

namespace Accelade\Schemas\Concerns;

use Accelade\Schemas\Component;

/**
 * Trait for components that can contain child components.
 */
trait HasSchema
{
    protected array $schema = [];

    /**
     * Set child components.
     *
     * @param  array<Component|mixed>  $components
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
     */
    public function getVisibleSchema(): array
    {
        return array_values(array_filter($this->schema, function ($component): bool {
            if (method_exists($component, 'isHidden')) {
                return ! $component->isHidden();
            }

            return true;
        }));
    }

    /**
     * Check if the component has child components.
     */
    public function hasSchema(): bool
    {
        return ! empty($this->schema);
    }
}
