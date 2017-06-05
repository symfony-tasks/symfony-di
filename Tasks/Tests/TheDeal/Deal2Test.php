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
        $container->autowire('circular_a', A::class);
        $container->autowire('circular_b', B::class);
        $container->autowire('circular_c', C::class);

        $container->compile();
        return $container;
    }
}
