<?php

namespace BankiruSchool\DI\Tasks\Tests\TheFalseBottom;

use BankiruSchool\DI\Common\Greeter;
use BankiruSchool\DI\Common\GreetingController;
use BankiruSchool\DI\Common\Tests\TheFalseBottom\False2;
use Psr\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

class False2Test extends False2
{
    protected function getContainer(): ContainerInterface
    {
        $container = new ContainerBuilder();
        $container
            ->register('greeting_controller', GreetingController::class)
            ->setArguments([
                new Definition(Greeter::class)
            ]);
        $container->addAliases([
            'controller' => 'greeting_controller',
            'greeting_action' => 'greeting_controller',
        ]);
        return $container;
    }
}
