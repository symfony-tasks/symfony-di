<?php

namespace SymfonyTasks\DI\Common\Tests\CompileTime;

use Exception;
use SymfonyTasks\DI\Common\OptionalDependency;
use SymfonyTasks\DI\Common\OptionalRegistry;
use SymfonyTasks\DI\Common\Tests\Dumper;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;

abstract class Compile2 extends TestCase
{
    final public function getServiceVariations(): array
    {
        return [
            'Empty'         => [[]],
            'One service'   => [['op_dep_1']],
            'Five services' => [['op_dep_1', 'op_dep_2', 'op_dep_3', 'op_dep_4', 'op_dep_5']],
        ];
    }

    /**
     * @dataProvider getServiceVariations
     *
     * @param array $services
     * @throws Exception
     */
    final public function testRegistryContainsAllServices(array $services): void
    {
        $builder = $this->getBuilder();
        $this->configureBuilder($builder);
        $this->updateBuilder($builder, $services);
        $builder->compile();

        /** @var OptionalRegistry $seeker */
        $seeker = $builder->get('seeker');
        self::assertCount(count($services), $seeker->getDependencies());

        Dumper::dump($builder);
    }

    abstract protected function configureBuilder(ContainerBuilder $builder);

    private function getBuilder(): ContainerBuilder
    {
        $builder = new ContainerBuilder();

        $builder
            ->register('seeker', OptionalRegistry::class)
            ->setPublic(true);

        return $builder;
    }

    private function updateBuilder(ContainerBuilder $builder, array $ids): void
    {
        foreach ($ids as $id) {
            $builder->register($id, OptionalDependency::class)->addTag('find_me');
        }
    }
}
