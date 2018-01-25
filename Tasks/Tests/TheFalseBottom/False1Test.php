<?php

namespace SymfonyTasks\DI\Tasks\Tests\TheFalseBottom;

use SymfonyTasks\DI\Common\Tests\TheFalseBottom\False1;
use Psr\Container\ContainerInterface;

final class False1Test extends False1
{
    protected function getContainer(): ContainerInterface
    {
    }
}
