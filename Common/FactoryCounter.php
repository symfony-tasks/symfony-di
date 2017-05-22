<?php

namespace BankiruSchool\DI\Common;

final class FactoryCounter implements InitializationCounterInterface
{
    use CounterTrait;

    /**
     * StaticCounter constructor.
     */
    private function __construct()
    {
        static::$initializations++;
    }

    public static function create()
    {
        return new static();
    }
}
