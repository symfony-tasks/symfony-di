<?php

namespace SymfonyTasks\DI\Common\Tests\TheBox;

use SymfonyTasks\DI\Common\InitializationCounterInterface;
use SymfonyTasks\DI\Common\StaticCounter;

abstract class Task3 extends Task1
{
    /**
     * @runInSeparateProcess
     */
    final public function testSharedService()
    {
        $container = $this->getContainer();
        self::assertEquals(0, $this->getCounterClass()::getInitializationsCount());
        $container->get('static_counter');
        self::assertEquals(1, $this->getCounterClass()::getInitializationsCount());
        $container->get('static_counter');
        $container->get('static_counter');
        self::assertEquals(1, $this->getCounterClass()::getInitializationsCount());
    }

    /**
     * @return InitializationCounterInterface
     */
    protected function getCounterClass()
    {
        return StaticCounter::class;
    }
}
