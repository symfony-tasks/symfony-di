<?php

namespace SymfonyTasks\DI\Common\Tests;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;

final class Dumper
{
    public static function dump(ContainerBuilder $builder): void
    {
        if (!$builder->isCompiled()) {
            $builder->compile();
        }
        $dumper = new PhpDumper($builder);
        $dumper->dump();
    }
}
