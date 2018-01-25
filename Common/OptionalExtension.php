<?php

namespace SymfonyTasks\DI\Common;

final class OptionalExtension
{
    /** @var OptionalDependency */
    private $dependency;

    /**
     * OptionalExtension constructor.
     *
     * @param OptionalDependency $dependency
     */
    public function __construct(OptionalDependency $dependency)
    {
        $this->dependency = $dependency;
    }

    /**
     * @return OptionalDependency
     */
    public function getDependency(): OptionalDependency
    {
        return $this->dependency;
    }
}
