<?php

namespace BankiruSchool\DI\Common\Tests\CompileTime;

use BankiruSchool\DI\Common\OptionalDependency;
use BankiruSchool\DI\Common\OptionalRegistry;
use BankiruSchool\DI\Common\Tests\Dumper;
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
     */
    final public function testRegistryContainsAllServices(array $services)
    {
        $builder = $this->getBuilder();
        $this->configureBuilder($builder);
        $this->updateBuilder($builder, $services);
        $builder->compile();

        /** @var OptionalRegistry $seeker */
        $seeker = $builder->get('seeker');
        self::assertEquals(count($services), count($seeker->getDependencies()));

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

    private function updateBuilder(ContainerBuilder $builder, array $ids)
    {
        foreach ($ids as $id) {
            $builder->register($id, OptionalDependency::class)->addTag('find_me');
        }
    }
}
