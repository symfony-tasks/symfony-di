<?php

namespace SymfonyTasks\DI\Tasks\Tests\TheBox;

use SymfonyTasks\DI\Common\Tests\TheBox\Task3;
use Psr\Container\ContainerInterface;

final class Task3Test extends Task3
{
    protected function getContainer(): ContainerInterface
    {
    }
}
