<?php

namespace BankiruSchool\DI\Tasks\Tests\CompileTime;

use BankiruSchool\DI\Common\OptionalDependency;
use BankiruSchool\DI\Common\OptionalRegistry;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class Pass2 implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $findMeServices = $container->findTaggedServiceIds('find_me');

        /** @var OptionalRegistry $seeker */
        $seeker = $container->get('seeker');

        foreach ($findMeServices as $service) {
            $seeker->addDependency(new OptionalDependency());
        }
    }
}
