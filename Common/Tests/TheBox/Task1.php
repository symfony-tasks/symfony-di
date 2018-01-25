<?php

namespace SymfonyTasks\DI\Common\Tests\TheBox;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

abstract class Task1 extends TestCase
{
    /**
     * @expectedException \Psr\Container\NotFoundExceptionInterface
     */
    final public function testGettingUnknownServiceThrowsException()
    {
        $this->getContainer()->get('not found');
    }

    final public function testCheckingUnknownServiceReturnsFalse()
    {
        self::assertFalse($this->getContainer()->has('not found'));
    }

    abstract protected function getContainer(): ContainerInterface;
}
