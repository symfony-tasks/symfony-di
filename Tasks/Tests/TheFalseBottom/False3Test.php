<?php

namespace SymfonyTasks\DI\Tasks\Tests\TheFalseBottom;

use SymfonyTasks\DI\Common\Tests\TheFalseBottom\False3;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class False3Test extends False3
{
    protected function configureContainer(ContainerBuilder $builder)
    {
    }
}
