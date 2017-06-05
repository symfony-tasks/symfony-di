<?php

namespace BankiruSchool\DI\Tasks\Tests\CompileTime;

use BankiruSchool\DI\Common\OptionalDependency;
use BankiruSchool\DI\Common\OptionalRegistry;
use BankiruSchool\DI\Common\Tests\CompileTime\Compile2;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class Compile2Test extends Compile2
{
    protected function configureBuilder(ContainerBuilder $builder)
    {
        $builder->addCompilerPass(
            new class implements CompilerPassInterface
            {
                /** {@inheritdoc} */
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
        );
    }
}
