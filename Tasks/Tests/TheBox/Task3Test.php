<?php

namespace BankiruSchool\DI\Tasks\Tests\TheBox;

use BankiruSchool\DI\Common\StaticCounter;
use BankiruSchool\DI\Common\Tests\TheBox\Task3;
use Psr\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class Task3Test extends Task3
{
    protected function getContainer(): ContainerInterface
    {
        $container = new ContainerBuilder();
        $container->register('static_counter', StaticCounter::class);
        $container->compile();

        return $container;
    }
}
