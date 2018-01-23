<?php

namespace BankiruSchool\DI\Tasks\Tests\TheYaml;

use BankiruSchool\DI\Common\Tests\TheBox\Task5;
use Psr\Container\ContainerInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

final class Yaml3Test extends Task5
{
    protected function getContainer(): ContainerInterface
    {
        $container = new ContainerBuilder();
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . DIRECTORY_SEPARATOR . 'config'));
        $loader->load('services_test_3.yaml');
        return $container;
    }
}
