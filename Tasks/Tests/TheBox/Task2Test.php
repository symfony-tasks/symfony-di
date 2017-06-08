<?php

namespace BankiruSchool\DI\Tasks\Tests\TheBox;

use BankiruSchool\DI\Common\Tests\TheBox\Task2;
use Psr\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;

final class Task2Test extends Task2
{
    protected function getContainer(): ContainerInterface
    {
        return new Container();
    }
}
