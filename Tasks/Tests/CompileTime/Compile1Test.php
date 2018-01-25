<?php

namespace SymfonyTasks\DI\Tasks\Tests\CompileTime;

use SymfonyTasks\DI\Common\Tests\CompileTime\Compile1;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class Compile1Test extends Compile1
{
    protected function configureBuilder(ContainerBuilder $builder)
    {
    }
}
