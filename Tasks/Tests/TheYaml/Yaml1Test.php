<?php

namespace BankiruSchool\DI\Tasks\Tests\TheYaml;

use BankiruSchool\DI\Common\Tests\TheBox\Task3;
use Psr\Container\ContainerInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

final class Yaml1Test extends Task3
{
    protected function getContainer(): ContainerInterface
    {
        $container = new ContainerBuilder();
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__));
        $loader->load('config_1.yml');
        $container->compile();
        return $container;
    }
}
