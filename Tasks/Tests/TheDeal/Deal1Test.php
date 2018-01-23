<?php

namespace BankiruSchool\DI\Tasks\Tests\TheDeal;

use BankiruSchool\DI\Common\Circular\A;
use BankiruSchool\DI\Common\Circular\B;
use BankiruSchool\DI\Common\Circular\C;
use BankiruSchool\DI\Common\Tests\TheDeal\Deal1;
use Psr\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

final class Deal1Test extends Deal1
{
    protected function getContainer(): ContainerInterface
    {
        $builder = new ContainerBuilder();

        $builder
            ->register('circular_a', A::class)
            ->addMethodCall('setB', [new Reference('circular_b')]);

        $builder
            ->register('circular_b', B::class)
            ->addMethodCall('setC', [new Reference('circular_c')]);

        $builder
            ->register('circular_c', C::class)
            ->addMethodCall('setA', [new Reference('circular_a')]);

        return $builder;
    }
}
