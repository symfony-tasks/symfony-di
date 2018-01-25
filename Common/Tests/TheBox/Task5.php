<?php

namespace SymfonyTasks\DI\Common\Tests\TheBox;

use SymfonyTasks\DI\Common\FactoryCounter;

abstract class Task5 extends Task3
{
    protected function getCounterClass()
    {
        return FactoryCounter::class;
    }
}
