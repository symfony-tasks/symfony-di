<?php

namespace BankiruSchool\DI\Tasks\Tests\TheFalseBottom;

use BankiruSchool\DI\Common\Greeter;
use BankiruSchool\DI\Common\GreetingController;
use BankiruSchool\DI\Common\Tests\TheFalseBottom\False1;
use Psr\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

final class False1Test extends False1
{
    protected function getContainer(): ContainerInterface
    {
        $container = new ContainerBuilder();
        $container
            ->register('greeting_controller', GreetingController::class)
            ->setArguments([
                new Definition(Greeter::class)
            ]);
        return $container;
    }
}
