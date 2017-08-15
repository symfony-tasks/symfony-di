<?php

namespace BankiruSchool\DI\Tasks\Tests\CompileTime;

use BankiruSchool\DI\Common\Tests\CompileTime\Compile2;
use BankiruSchool\DI\Tasks\Tests\CompileTime\Compiler\Compile2CompilerPass;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

final class Compile2Test extends Compile2
{
    protected function configureBuilder(ContainerBuilder $builder)
    {
        $builder->addCompilerPass(new class() implements CompilerPassInterface {
            public function process(ContainerBuilder $container)
            {
                $taggedServices = $container->findTaggedServiceIds('find_me');

                $definition = $container->findDefinition('seeker');
                foreach ($taggedServices as $id => $tags) {
                    $definition->addMethodCall('addDependency', array(new Reference($id)));
                }
            }
        });
    }
}
