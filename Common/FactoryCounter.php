<?php

namespace SymfonyTasks\DI\Common;

final class FactoryCounter implements InitializationCounterInterface
{
    use CounterTrait;

    private function __construct()
    {
        static::$initializations++;
    }

    public static function create(): FactoryCounter
    {
        return new static();
    }
}
