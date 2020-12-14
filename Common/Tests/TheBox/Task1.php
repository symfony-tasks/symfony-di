<?php

namespace SymfonyTasks\DI\Common\Tests\TheBox;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

abstract class Task1 extends TestCase
{
    final public function testGettingUnknownServiceThrowsException(): void
    {
        $this->expectException(NotFoundExceptionInterface::class);
        $this->getContainer()->get('not found');
    }

    final public function testCheckingUnknownServiceReturnsFalse(): void
    {
        self::assertFalse($this->getContainer()->has('not found'));
    }

    abstract protected function getContainer(): ContainerInterface;
}
