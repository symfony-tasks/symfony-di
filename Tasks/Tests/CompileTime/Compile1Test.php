<?php

namespace BankiruSchool\DI\Tasks\Tests\CompileTime;

use BankiruSchool\DI\Common\Tests\CompileTime\Compile1;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class Compile1Test extends Compile1
{
    protected function configureBuilder(ContainerBuilder $builder)
    {
        $builder->addCompilerPass(new Pass1());
    }
}
