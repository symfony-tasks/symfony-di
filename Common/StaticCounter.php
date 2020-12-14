<?php

namespace SymfonyTasks\DI\Common;

final class StaticCounter implements InitializationCounterInterface
{
    use CounterTrait;

    public function __construct()
    {
        static::$initializations++;
    }
}
