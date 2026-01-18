<?php

declare(strict_types=1);

namespace Accelade\Schemas\Contracts;

use Illuminate\Contracts\Support\Htmlable;

/**
 * Contract for components that can be rendered.
 * This is a common interface for Schema, Infolist, and Forms components.
 */
interface Renderable extends Htmlable
{
    /**
     * Get the component name.
     */
    public function getName(): string;

    /**
     * Check if the component is hidden.
     */
    public function isHidden(): bool;
}
