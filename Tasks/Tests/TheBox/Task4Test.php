<?php

namespace BankiruSchool\DI\Tasks\Tests\TheBox;

use BankiruSchool\DI\Common\StaticCounter;
use BankiruSchool\DI\Common\Tests\TheBox\Task4;
use Psr\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class Task4Test extends Task4
{
    protected function getContainer(): ContainerInterface
    {
        $container = new ContainerBuilder();
        $container->register('static_counter', StaticCounter::class)
                  ->setShared(false);
        $container->compile();
        return $container;
    }
}
