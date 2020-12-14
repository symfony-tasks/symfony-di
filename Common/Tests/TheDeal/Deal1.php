<?php

namespace SymfonyTasks\DI\Common\Tests\TheDeal;

use SymfonyTasks\DI\Common\Tests\TheBox\Task1;

abstract class Deal1 extends Task1
{
    final public function testCircularReferenceInstantiable(): void
    {
        $container = $this->getContainer();
        $a         = $container->get('circular_a');
        $b         = $container->get('circular_b');
        $c         = $container->get('circular_c');

        self::assertSame($a, $c->getA());
        self::assertSame($b, $a->getB());
        self::assertSame($c, $b->getC());
    }
}
