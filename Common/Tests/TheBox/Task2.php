<?php

namespace BankiruSchool\DI\Common\Tests\TheBox;

abstract class Task2 extends Task1
{
    final public function testGettingServiceContainerReturnsThis()
    {
        $container = $this->getContainer();
        self::assertSame($container, $container->get('service_container'));
    }
}
