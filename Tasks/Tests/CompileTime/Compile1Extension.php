<?php

namespace BankiruSchool\DI\Tasks\Tests\CompileTime;

use BankiruSchool\DI\Common\OptionalExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;

class Compile1Extension extends Extension implements PrependExtensionInterface
{
    public function load(array $configs, ContainerBuilder $container)
    {
    }

    public function prepend(ContainerBuilder $container)
    {
        if ($container->has('optional_dependency')) {
            $container
                ->register('optional_extension', OptionalExtension::class)
                ->setPublic(true);
        }
    }
}
