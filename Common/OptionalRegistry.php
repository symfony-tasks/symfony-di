<?php

namespace SymfonyTasks\DI\Common;

final class OptionalRegistry
{
    /** @var OptionalDependency[] */
    private array $dependencies = [];

    public function addDependency(OptionalDependency $dependency): void
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
