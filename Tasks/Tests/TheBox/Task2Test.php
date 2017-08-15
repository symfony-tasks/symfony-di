<?php

namespace BankiruSchool\DI\Tasks\Tests\TheBox;

use BankiruSchool\DI\Common\Tests\TheBox\Task2;
use Psr\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class Task2Test extends Task2
{
    protected function getContainer(): ContainerInterface
    {
        $container = new ContainerBuilder();
        $container->register('service_container', 'Symfony\Component\DependencyInjection\ContainerBuilder');
        $container->compile();

        return $container;
    }
}
