<?php

namespace BankiruSchool\DI\Tasks\Tests\TheDeal;

use BankiruSchool\DI\Common\Tests\TheDeal\Deal1;
use Psr\Container\ContainerInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

final class Deal1Test extends Deal1
{
    protected function getContainer(): ContainerInterface
    {
        $container = new ContainerBuilder();
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/config/'));
        $loader->load('deal1test.yml');
        $container->compile();

        return $container;
    }
}
