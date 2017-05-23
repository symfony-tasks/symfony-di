<?php

namespace BankiruSchool\DI\Tasks\Tests\TheFalseBottom;

use BankiruSchool\DI\Common\Tests\TheFalseBottom\False1;
use Psr\Container\ContainerInterface;

final class False1Test extends False1
{
    protected function getContainer(): ContainerInterface
    {
    }
}
