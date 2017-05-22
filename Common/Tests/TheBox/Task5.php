<?php

namespace BankiruSchool\DI\Common\Tests\TheBox;

use BankiruSchool\DI\Common\FactoryCounter;

abstract class Task5 extends Task3
{
    protected function getCounterClass()
    {
        return FactoryCounter::class;
    }
}
