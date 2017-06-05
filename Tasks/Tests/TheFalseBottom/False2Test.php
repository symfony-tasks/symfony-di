<?php

namespace BankiruSchool\DI\Tasks\Tests\TheFalseBottom;

use BankiruSchool\DI\Common\Greeter;
use BankiruSchool\DI\Common\GreetingController;
use BankiruSchool\DI\Common\Tests\TheFalseBottom\False2;
use Psr\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class False2Test extends False2
{
    protected function getContainer(): ContainerInterface
    {
        $container = new ContainerBuilder();

        $container->register('greeter', Greeter::class)
                  ->setPublic(false);

        $container->register('greeting_controller', GreetingController::class)
                  ->addArgument(new Reference('greeter'));

        $container->setAliases(['controller' => 'greeting_controller', 'greeting_action' => 'greeting_controller']);

        $container->compile();
        return $container;
    }
}
