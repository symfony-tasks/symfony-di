<?php

namespace BankiruSchool\DI\Tasks\Tests\TheDeal;

use BankiruSchool\DI\Common\Tests\TheDeal\Deal2;
use Psr\Container\ContainerInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

final class Deal2Test extends Deal2
{
    protected function getContainer(): ContainerInterface
    {
        $container = new ContainerBuilder();
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/config/'));
        $loader->load('deal2test.yml');
        $container->compile();

        return $container;
    }
}
