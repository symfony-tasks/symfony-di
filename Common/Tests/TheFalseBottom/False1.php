<?php

namespace SymfonyTasks\DI\Common\Tests\TheFalseBottom;

use SymfonyTasks\DI\Common\GreetingController;
use SymfonyTasks\DI\Common\Tests\TheBox\Task1;

abstract class False1 extends Task1
{
    final public function testGreetingControllerHasHiddenDeps(): void
    {
        $container = $this->getContainer();
        /** @var GreetingController $controller */
        $controller = $container->get('greeting_controller');
        self::assertEquals('Greetings, applicant', $controller->greetAction('applicant'));

        self::assertFalse($container->has('greeter'));
    }
}
