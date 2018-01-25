<?php

namespace SymfonyTasks\DI\Common;

trait CounterTrait
{
    private static $initializations = 0;

    public static function getInitializationsCount():int
    {
        return static::$initializations;
    }
}
