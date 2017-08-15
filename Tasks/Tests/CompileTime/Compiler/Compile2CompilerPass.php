<?php

namespace BankiruSchool\DI\Tasks\Tests\CompileTime\Compiler;

use BankiruSchool\DI\Common\OptionalExtension;
use BankiruSchool\DI\Common\OptionalRegistry;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class Compile2CompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $taggedServices = $container->findTaggedServiceIds('find_me');

        $definition = $container->findDefinition('seeker');
        foreach ($taggedServices as $id => $tags) {
            $definition->addMethodCall('addDependency', array(new Reference($id)));
        }
    }
}
