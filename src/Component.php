<?php

declare(strict_types=1);

namespace Accelade\Schemas;

use Accelade\Schemas\Contracts\HasRecord;
use Accelade\Schemas\Contracts\Renderable;
use Closure;
use Illuminate\Support\Traits\Conditionable;

/**
 * Base component class for schema layout components.
 */
abstract class Component implements HasRecord, Renderable
{
    use Conditionable;

    protected string $name = '';

    protected ?string $id = null;

    protected string|Closure|null $label = null;

    protected bool $isHidden = false;

    protected array $extraAttributes = [];

    protected mixed $record = null;

    protected int|string|null $columnSpan = null;

    protected int|string|null $columnStart = null;

    /**
     * Create a new component instance.
     */
    public static function make(?string $name = null): static
    {
        $static = new static;
        $static->name = $name ?? '';
        $static->setUp();

        return $static;
    }

    /**
     * Set up the component. Override in subclasses.
     */
    protected function setUp(): void
    {
        // Override in subclasses
    }

    /**
     * Get the component name.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the component ID.
     */
    public function id(string $id): static
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the component ID.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Set the label.
     */
    public function label(string|Closure $label): static
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get the label.
     */
    public function getLabel(): ?string
    {
        return $this->evaluate($this->label);
    }

    /**
     * Set hidden state.
     */
    public function hidden(bool $condition = true): static
    {
        $this->isHidden = $condition;

        return $this;
    }

    /**
     * Set visible state.
     */
    public function visible(bool $condition = true): static
    {
        $this->isHidden = ! $condition;

        return $this;
    }

    /**
     * Check if hidden.
     */
    public function isHidden(): bool
    {
        return $this->isHidden;
    }

    /**
     * Set the record for this component.
     */
    public function record(mixed $record): static
    {
        $this->record = $record;

        return $this;
    }

    /**
     * Get the record for this component.
     */
    public function getRecord(): mixed
    {
        return $this->record;
    }

    /**
     * Set the column span for grid layouts.
     */
    public function columnSpan(int|string|null $span): static
    {
        $this->columnSpan = $span;

        return $this;
    }

    /**
     * Make the component span all columns.
     */
    public function columnSpanFull(): static
    {
        $this->columnSpan = 'full';

        return $this;
    }

    /**
     * Get the column span.
     */
    public function getColumnSpan(): int|string|null
    {
        return $this->columnSpan;
    }

    /**
     * Check if column span is full.
     */
    public function isColumnSpanFull(): bool
    {
        return $this->columnSpan === 'full';
    }

    /**
     * Set the column start position.
     */
    public function columnStart(int|string|null $start): static
    {
        $this->columnStart = $start;

        return $this;
    }

    /**
     * Get the column start position.
     */
    public function getColumnStart(): int|string|null
    {
        return $this->columnStart;
    }

    /**
     * Add extra HTML attributes.
     */
    public function extraAttributes(array $attributes): static
    {
        $this->extraAttributes = array_merge($this->extraAttributes, $attributes);

        return $this;
    }

    /**
     * Get extra attributes.
     */
    public function getExtraAttributes(): array
    {
        return $this->extraAttributes;
    }

    /**
     * Evaluate a value that may be a Closure.
     */
    protected function evaluate(mixed $value): mixed
    {
        if ($value instanceof Closure) {
            return app()->call($value);
        }

        return $value;
    }

    /**
     * Get the view name for this component.
     */
    abstract protected function getView(): string;

    /**
     * Get the view data for rendering.
     */
    protected function getViewData(): array
    {
        return [
            'component' => $this,
        ];
    }

    /**
     * Render the component to HTML.
     */
    public function render(): string
    {
        if ($this->isHidden()) {
            return '';
        }

        return view($this->getView(), $this->getViewData())->render();
    }

    /**
     * Get content as a string of HTML.
     */
    public function toHtml(): string
    {
        return $this->render();
    }

    /**
     * Convert component to string.
     */
    public function __toString(): string
    {
        return $this->render();
    }

    /**
     * Serialize to array for JSON output.
     */
    public function toArray(): array
    {
        return [
            'type' => class_basename(static::class),
            'name' => $this->name,
            'id' => $this->id,
            'label' => $this->getLabel(),
            'hidden' => $this->isHidden,
        ];
    }
}
