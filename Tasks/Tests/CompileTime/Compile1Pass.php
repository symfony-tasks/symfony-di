<?php
namespace BankiruSchool\DI\Tasks\Tests\CompileTime;

use BankiruSchool\DI\Common\OptionalExtension;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class Compile1Pass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if($container->has('optional_dependency')){
            $container->register('optional_extension', OptionalExtension::class);
        }
    }
}