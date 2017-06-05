<?php

namespace BankiruSchool\DI\Tasks\Tests\CompileTime;

use BankiruSchool\DI\Common\OptionalExtension;
use BankiruSchool\DI\Common\Tests\CompileTime\Compile1;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class Compile1Test extends Compile1
{
    protected function configureBuilder(ContainerBuilder $builder)
    {
        $builder->addCompilerPass(
            new class implements CompilerPassInterface
            {
                /** {@inheritdoc} */
                public function process(ContainerBuilder $container)
                {
                    if ($container->has('optional_dependency')) {
                        $container->register('optional_extension', OptionalExtension::class);
                    }
                }
            }
        );
    }
}
