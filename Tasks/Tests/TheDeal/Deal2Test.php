<?php

namespace BankiruSchool\DI\Tasks\Tests\TheDeal;

use BankiruSchool\DI\Common\Circular\A;
use BankiruSchool\DI\Common\Circular\B;
use BankiruSchool\DI\Common\Circular\C;
use BankiruSchool\DI\Common\Tests\TheDeal\Deal2;
use Psr\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class Deal2Test extends Deal2
{
    protected function getContainer(): ContainerInterface
    {
        $container = new ContainerBuilder();
        
        $container->autowire(A::class);
        $container->autowire(B::class);
        $container->autowire(C::class);

        $container->addAliases([
            'circular_a' => A::class,
            'circular_b' => B::class,
            'circular_c' => C::class,
        ]);

        $container->compile();

        return $container;
    }
}
