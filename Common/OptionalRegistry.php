<?php

namespace SymfonyTasks\DI\Common;

final class OptionalRegistry
{
    /** @var OptionalDependency[] */
    private $dependencies = [];

    public function addDependency(OptionalDependency $dependency)
    {
        $this->dependencies[] = $dependency;
    }

    /**
     * @return OptionalDependency[]
     */
    public function getDependencies(): array
    {
        return $this->dependencies;
    }
}
