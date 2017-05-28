<?php

namespace BankiruSchool\DI\Tasks\Tests\TheYaml;

use BankiruSchool\DI\Common\Tests\TheBox\Task4;
use Psr\Container\ContainerInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

final class Yaml2Test extends Task4
{
    protected function getContainer(): ContainerInterface
    {
        $container = new ContainerBuilder();
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__));
        $loader->load('config_2.yml');
        $container->compile();
        return $container;
    }
}
