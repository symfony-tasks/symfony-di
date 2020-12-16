<?php

namespace SymfonyTasks\DI\Common\Tests\CompileTime;

use SymfonyTasks\DI\Common\OptionalDependency;
use SymfonyTasks\DI\Common\Tests\Dumper;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;

abstract class Compile1 extends TestCase
{
    final public function testExtensionPresentIfDependencyPresent(): void
    {
        $builder = $this->getBuilder();
        $this->configureBuilder($builder);
        $this->addDependency($builder);
        $builder->compile();

        self::assertTrue($builder->has('optional_dependency'));
        self::assertTrue($builder->has('optional_extension'));

        Dumper::dump($builder);
    }

    final public function testExtensionNotPresentIfDependencyNotPresent(): void
    {
        $builder = $this->getBuilder();
        $this->configureBuilder($builder);
        $builder->compile();

        self::assertFalse($builder->has('optional_dependency'));
        self::assertFalse($builder->has('optional_extension'));

        Dumper::dump($builder);
    }

    abstract protected function configureBuilder(ContainerBuilder $builder);

    private function getBuilder(): ContainerBuilder
    {
        return new ContainerBuilder();
    }

    private function addDependency(ContainerBuilder $builder): void
    {
        $builder
            ->register('optional_dependency', OptionalDependency::class)
            ->setPublic(true);
    }
}
