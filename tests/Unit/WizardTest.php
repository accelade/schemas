<?php

declare(strict_types=1);

use Accelade\Schemas\Components\Step;
use Accelade\Schemas\Components\Wizard;

it('can create a wizard', function () {
    $wizard = Wizard::make('registration');

    expect($wizard->getName())->toBe('registration');
});

it('can set steps', function () {
    $step1 = Step::make('Account');
    $step2 = Step::make('Profile');

    $wizard = Wizard::make()
        ->steps([$step1, $step2]);

    expect($wizard->getSteps())->toHaveCount(2);
});

it('can set start step', function () {
    $wizard = Wizard::make()
        ->startOnStep(1);

    expect($wizard->getStartStep())->toBe(1);
});

it('can be skippable', function () {
    $wizard = Wizard::make()
        ->skippable();

    expect($wizard->isSkippable())->toBeTrue();
});

it('can set navigation labels', function () {
    $wizard = Wizard::make()
        ->nextAction('Continue')
        ->previousAction('Back')
        ->submitAction('Finish');

    expect($wizard->getNextLabel())->toBe('Continue');
    expect($wizard->getPreviousLabel())->toBe('Back');
    expect($wizard->getSubmitLabel())->toBe('Finish');
});

it('can convert to array', function () {
    $step = Step::make('First');
    $wizard = Wizard::make()
        ->steps([$step])
        ->skippable()
        ->nextAction('Continue');

    $array = $wizard->toArray();

    expect($array['type'])->toBe('Wizard');
    expect($array['steps'])->toHaveCount(1);
    expect($array['skippable'])->toBeTrue();
    expect($array['nextLabel'])->toBe('Continue');
});
