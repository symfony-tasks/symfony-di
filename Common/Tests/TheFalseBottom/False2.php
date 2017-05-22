<?php

namespace BankiruSchool\DI\Common\Tests\TheFalseBottom;

use BankiruSchool\DI\Common\Tests\TheBox\Task1;

abstract class False2 extends Task1
{
    final public function testController()
    {
        $container = $this->getContainer();

        $controller = $container->get('greeting_controller');
        self::assertSame($controller, $container->get('controller'));
        self::assertSame($controller, $container->get('greeting_action'));
    }
}
