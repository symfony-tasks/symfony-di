<?php

namespace BankiruSchool\DI\Common\Tests\TheFalseBottom;

use BankiruSchool\DI\Common\GreetingController;
use BankiruSchool\DI\Common\Tests\TheBox\Task1;

abstract class False1 extends Task1
{
    final public function testGreetingControllerHasHiddenDeps()
    {
        $container = $this->getContainer();
        /** @var GreetingController $controller */
        $controller = $container->get('greeting_controller');
        self::assertEquals('Greetings, applicant', $controller->greetAction('applicant'));

        self::assertFalse($container->has('greeter'));
    }
}
