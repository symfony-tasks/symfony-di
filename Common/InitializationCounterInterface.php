<?php

namespace SymfonyTasks\DI\Common;

interface InitializationCounterInterface
{
    public static function getInitializationsCount(): int;
}
