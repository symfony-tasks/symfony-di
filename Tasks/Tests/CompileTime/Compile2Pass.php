<?php

namespace BankiruSchool\DI\Tasks\Tests\CompileTime;

use BankiruSchool\DI\Common\OptionalDependency;
use BankiruSchool\DI\Common\OptionalRegistry;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class Compile2Pass implements CompilerPassInterface
{

    /**
     * You can modify the container here before it is dumped to PHP code.
     *
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        $services = $container->findTaggedServiceIds('find_me');

        /** @var OptionalRegistry $seeker */
        $seeker = $container->get('seeker');

        foreach($services as $service){
            $seeker->addDependency(new OptionalDependency());
        }
    }
}