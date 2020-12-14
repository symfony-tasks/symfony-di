<?php

namespace SymfonyTasks\DI\Common;

final class OptionalExtension
{
    private OptionalDependency $dependency;

    public function __construct(OptionalDependency $dependency)
    {
        $this->dependency = $dependency;
    }

    public function getDependency(): OptionalDependency
    {
        return $this->dependency;
    }
}
