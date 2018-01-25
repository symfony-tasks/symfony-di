<?php

namespace SymfonyTasks\DI\Tasks\Tests\TheDeal;

use SymfonyTasks\DI\Common\Tests\TheDeal\Deal1;
use Psr\Container\ContainerInterface;

final class Deal1Test extends Deal1
{
    protected function getContainer(): ContainerInterface
    {
    }
}
