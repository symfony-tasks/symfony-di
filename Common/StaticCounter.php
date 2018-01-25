<?php

namespace SymfonyTasks\DI\Common;

final class StaticCounter implements InitializationCounterInterface
{
    use CounterTrait;

    /**
     * StaticCounter constructor.
     */
    public function __construct()
    {
        static::$initializations++;
    }
}
