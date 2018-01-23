<?php

namespace BankiruSchool\DI\Tasks\Tests\CompileTime;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class Compile1Pass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        foreach (array_keys($container->findTaggedServiceIds('find_me')) as $id) {
            $container
                ->getDefinition('seeker')
                ->addMethodCall('addDependency', [new Reference($id)]);
        }
    }
}
