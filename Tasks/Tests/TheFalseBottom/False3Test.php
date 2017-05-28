<?php

namespace BankiruSchool\DI\Tasks\Tests\TheFalseBottom;

use BankiruSchool\DI\Common\Tests\TheFalseBottom\False3;
use BankiruSchool\DI\Common\Tracker\BasicTracker;
use BankiruSchool\DI\Common\Tracker\CachingTracker;
use BankiruSchool\DI\Common\Tracker\LoggingTracker;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

final class False3Test extends False3
{
    /**
     * @param ContainerBuilder $builder
     */
    protected function configureContainer(ContainerBuilder $builder)
    {
        $builder->register('tracker', BasicTracker::class);
        if ($builder->has('logger')) {
            $builder->register('logger_tracker', LoggingTracker::class)
                ->setDecoratedService('tracker', null, 10)
                ->setPublic(false)
                ->addArgument(new Reference('logger_tracker.inner'))
                ->addArgument(new Reference('logger'));
        }
        if ($builder->has('cache')) {
            $builder->register('caching_tracker', CachingTracker::class)
                ->setDecoratedService('tracker', null, 1)
                ->setPublic(false)
                ->addArgument(new Reference('caching_tracker.inner'))
                ->addArgument(new Reference('cache'));
        }
    }
}
