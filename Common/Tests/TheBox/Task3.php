<?php

namespace SymfonyTasks\DI\Common\Tests\TheBox;

use SymfonyTasks\DI\Common\StaticCounter;

abstract class Task3 extends Task1
{
    /**
     * @runInSeparateProcess
     */
    final public function testSharedService(): void
    {
        $container = $this->getContainer();
        self::assertEquals(0, $this->getCounterClass()::getInitializationsCount());
        $container->get('static_counter');
        self::assertEquals(1, $this->getCounterClass()::getInitializationsCount());
        $container->get('static_counter');
        $container->get('static_counter');
        self::assertEquals(1, $this->getCounterClass()::getInitializationsCount());
    }

    protected function getCounterClass(): string
    {
        return StaticCounter::class;
    }
}
