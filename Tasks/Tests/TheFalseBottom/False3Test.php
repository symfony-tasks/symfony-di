<?php

namespace BankiruSchool\DI\Tasks\Tests\TheFalseBottom;

use BankiruSchool\DI\Common\Tests\TheFalseBottom\False3;
use BankiruSchool\DI\Common\Tracker\CachingTracker;
use BankiruSchool\DI\Common\Tracker\LoggingTracker;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

final class False3Test extends False3
{
    protected function configureContainer(ContainerBuilder $builder)
    {
        if ($builder->has('logger') && $builder->has('cache')) {
            $builder
                ->register('tracker.decorator.logger', LoggingTracker::class)
                ->setDecoratedService('tracker', null, 2)
                ->addArgument(new Reference('tracker.decorator.logger.inner'))
                ->addArgument(new Reference('logger'))
                ->setPublic(false);
            $builder
                ->register('tracker.decorator.cache', CachingTracker::class)
                ->setDecoratedService('tracker', null, 1)
                ->addArgument(new Reference('tracker.decorator.cache.inner'))
                ->addArgument(new Reference('cache'))
                ->setPublic(false);
        } elseif ($builder->has('logger')) {
            $builder
                ->register('tracker.decorator.logger', LoggingTracker::class)
                ->setDecoratedService('tracker')
                ->addArgument(new Reference('tracker.decorator.logger.inner'))
                ->addArgument(new Reference('logger'))
                ->setPublic(false);
        } elseif ($builder->has('cache')) {
            $builder
                ->register('tracker.decorator.cache', CachingTracker::class)
                ->setDecoratedService('tracker')
                ->addArgument(new Reference('tracker.decorator.cache.inner'))
                ->addArgument(new Reference('cache'))
                ->setPublic(false);
        }
    }
}
