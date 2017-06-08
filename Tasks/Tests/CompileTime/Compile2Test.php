<?php

namespace BankiruSchool\DI\Tasks\Tests\CompileTime;

use BankiruSchool\DI\Common\Tests\CompileTime\Compile2;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

final class Compile2Test extends Compile2
{
    protected function configureBuilder(ContainerBuilder $builder)
    {
        $builder->addCompilerPass(new class implements CompilerPassInterface
        {
            public function process(ContainerBuilder $container)
            {
                $seeker = $container->getDefinition('seeker');
                foreach ($container->findTaggedServiceIds('find_me') as $id => $tag) {
                    $seeker->addMethodCall('addDependency', [new Reference($id)]);
                }
            }
        });
    }
}

