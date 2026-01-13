<?php

declare(strict_types=1);

namespace Accelade\Schemas\Components;

use Accelade\Schemas\Component;

/**
 * Wizard component for multi-step forms.
 */
class Wizard extends Component
{
    protected array $steps = [];

    protected int $startStep = 0;

    protected bool $skippable = false;

    protected string $nextLabel = 'Next';

    protected string $previousLabel = 'Previous';

    protected string $submitLabel = 'Submit';

    /**
     * Set steps (array of Step components).
     *
     * @param  array<Step>  $steps
     */
    public function steps(array $steps): static
    {
        $this->steps = $steps;

        return $this;
    }

    /**
     * Get steps.
     */
    public function getSteps(): array
    {
        return $this->steps;
    }

    /**
     * Get visible steps.
     */
    public function getVisibleSteps(): array
    {
        return array_values(array_filter($this->steps, function (Step $step): bool {
            return ! $step->isHidden();
        }));
    }

    /**
     * Set starting step index.
     */
    public function startOnStep(int $step): static
    {
        $this->startStep = $step;

        return $this;
    }

    /**
     * Get start step.
     */
    public function getStartStep(): int
    {
        return $this->startStep;
    }

    /**
     * Allow skipping steps.
     */
    public function skippable(bool $condition = true): static
    {
        $this->skippable = $condition;

        return $this;
    }

    /**
     * Check if skippable.
     */
    public function isSkippable(): bool
    {
        return $this->skippable;
    }

    /**
     * Set the next button label.
     */
    public function nextAction(string $label): static
    {
        $this->nextLabel = $label;

        return $this;
    }

    /**
     * Get next button label.
     */
    public function getNextLabel(): string
    {
        return $this->nextLabel;
    }

    /**
     * Set the previous button label.
     */
    public function previousAction(string $label): static
    {
        $this->previousLabel = $label;

        return $this;
    }

    /**
     * Get previous button label.
     */
    public function getPreviousLabel(): string
    {
        return $this->previousLabel;
    }

    /**
     * Set the submit button label.
     */
    public function submitAction(string $label): static
    {
        $this->submitLabel = $label;

        return $this;
    }

    /**
     * Get submit button label.
     */
    public function getSubmitLabel(): string
    {
        return $this->submitLabel;
    }

    /**
     * Get the view name.
     */
    protected function getView(): string
    {
        return 'schemas::components.wizard';
    }

    /**
     * Convert to array.
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'steps' => array_map(fn (Step $step) => $step->toArray(), $this->steps),
            'startStep' => $this->startStep,
            'skippable' => $this->skippable,
            'nextLabel' => $this->nextLabel,
            'previousLabel' => $this->previousLabel,
            'submitLabel' => $this->submitLabel,
        ]);
    }
}
