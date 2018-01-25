<?php

namespace SymfonyTasks\DI\Tasks\Tests\CompileTime;

use SymfonyTasks\DI\Common\Tests\CompileTime\Compile2;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class Compile2Test extends Compile2
{
    protected function configureBuilder(ContainerBuilder $builder)
    {
    }
}
