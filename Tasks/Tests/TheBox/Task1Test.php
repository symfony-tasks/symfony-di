<?php

namespace BankiruSchool\DI\Tasks\Tests\TheBox;

use BankiruSchool\DI\Common\Tests\TheBox\Task1;
use Psr\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class Task1Test extends Task1
{
    protected function getContainer(): ContainerInterface
    {
        $container = new ContainerBuilder();
        $container->compile();

        return $container;
    }
}
