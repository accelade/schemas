<?php

declare(strict_types=1);

namespace Accelade\Schemas\Contracts;

/**
 * Contract for components that can have a record associated with them.
 */
interface HasRecord
{
    /**
     * Set the record for this component.
     */
    public function record(mixed $record): static;

    /**
     * Get the record for this component.
     */
    public function getRecord(): mixed;
}
