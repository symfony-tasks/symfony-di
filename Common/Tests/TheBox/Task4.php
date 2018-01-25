<?php

namespace SymfonyTasks\DI\Common\Tests\TheBox;

use SymfonyTasks\DI\Common\StaticCounter;

abstract class Task4 extends Task1
{
    /**
     * @runInSeparateProcess
     */
    final public function testSharedService()
    {
        $container = $this->getContainer();
        self::assertEquals(0, StaticCounter::getInitializationsCount());
        $container->get('static_counter');
        self::assertEquals(1, StaticCounter::getInitializationsCount());
        $container->get('static_counter');
        self::assertEquals(2, StaticCounter::getInitializationsCount());
        $container->get('static_counter');
        self::assertEquals(3, StaticCounter::getInitializationsCount());
    }
}
