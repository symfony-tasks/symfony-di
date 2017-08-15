<?php

namespace BankiruSchool\DI\Tasks\Tests\CompileTime;

use BankiruSchool\DI\Common\Tests\CompileTime\Compile2;
use BankiruSchool\DI\Tasks\Tests\CompileTime\Compiler\Compile2CompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class Compile2Test extends Compile2
{
    protected function configureBuilder(ContainerBuilder $builder)
    {
        $builder->addCompilerPass(new Compile2CompilerPass());
    }
}
