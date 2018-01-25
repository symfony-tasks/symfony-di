<?php

namespace SymfonyTasks\DI\Tasks\Tests\TheFalseBottom;

use SymfonyTasks\DI\Common\Tests\TheFalseBottom\False2;
use Psr\Container\ContainerInterface;

class False2Test extends False2
{
    protected function getContainer(): ContainerInterface
    {
    }
}
