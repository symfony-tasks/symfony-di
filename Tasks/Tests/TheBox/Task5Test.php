<?php

namespace BankiruSchool\DI\Tasks\Tests\TheBox;

use BankiruSchool\DI\Common\FactoryCounter;
use BankiruSchool\DI\Common\StaticCounter;
use BankiruSchool\DI\Common\Tests\TheBox\Task5;
use Psr\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class Task5Test extends Task5
{
    protected function getContainer(): ContainerInterface
    {
        $container = new ContainerBuilder();
        $container
            ->register('static_counter', StaticCounter::class)
            ->setFactory([FactoryCounter::class, 'create']);
        $container->compile();

        return $container;
    }

}
