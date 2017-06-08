<?php

namespace BankiruSchool\DI\Tasks\Tests\TheFalseBottom;

use BankiruSchool\DI\Common\Tests\TheFalseBottom\False2;
use Psr\Container\ContainerInterface;
use BankiruSchool\DI\Common\Greeter;
use BankiruSchool\DI\Common\GreetingController;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class False2Test extends False2
{
    protected function getContainer(): ContainerInterface
    {
        $container = new ContainerBuilder();

        $container
            ->register('greeting_controller', GreetingController::class)
            ->addArgument(new Reference('greeter'));

        $container
            ->register('greeter', Greeter::class)
            ->setPublic(false);

        $container->setAlias('controller', 'greeting_controller');
        $container->setAlias('greeting_action', 'greeting_controller');

        $container->compile();

        return $container;
    }
}
