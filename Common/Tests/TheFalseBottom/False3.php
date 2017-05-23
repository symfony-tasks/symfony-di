<?php

namespace BankiruSchool\DI\Common\Tests\TheFalseBottom;

use BankiruSchool\DI\Common\Tracker\BasicTracker;
use BankiruSchool\DI\Common\Tracker\CachingTracker;
use BankiruSchool\DI\Common\Tracker\LoggingTracker;
use BankiruSchool\DI\Common\TrackerInterface;
use PHPUnit\Framework\TestCase;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Cache\Adapter\SimpleCacheAdapter;
use Symfony\Component\Cache\Simple\ArrayCache;
use Symfony\Component\DependencyInjection\ContainerBuilder;

abstract class False3 extends TestCase
{
    final public function testNoDecorations()
    {
        $container = $this->getContainer();

        self::assertTrue($container->has('tracker'));
        /** @var TrackerInterface $tracker */
        $tracker = $container->get('tracker');
        self::assertInstanceOf(BasicTracker::class, $tracker);
        self::assertEquals(4, $tracker->doTrack());
    }

    final public function testLoggerDecorator()
    {
        $container = $this->getContainer(true);

        self::assertTrue($container->has('tracker'));
        /** @var TrackerInterface $tracker */
        $tracker = $container->get('tracker');
        self::assertInstanceOf(LoggingTracker::class, $tracker);
        self::assertEquals(4, $tracker->doTrack());
    }

    final public function testCacheDecorator()
    {
        $container = $this->getContainer(false, true);

        self::assertTrue($container->has('tracker'));
        /** @var TrackerInterface $tracker */
        $tracker = $container->get('tracker');
        self::assertInstanceOf(CachingTracker::class, $tracker);

        /** @var CacheItemPoolInterface $cache */
        $cache = $container->get('cache');

        $item = $cache->getItem(CachingTracker::CACHE_KEY);
        self::assertFalse($item->isHit());

        self::assertEquals(4, $tracker->doTrack());

        $item = $cache->getItem(CachingTracker::CACHE_KEY);
        self::assertTrue($item->isHit());
    }

    final public function testBothDecorators()
    {
        $container = $this->getContainer(true, true);

        self::assertTrue($container->has('tracker'));
        /** @var TrackerInterface $tracker */
        $tracker = $container->get('tracker');
        self::assertInstanceOf(CachingTracker::class, $tracker);

        /** @var CacheItemPoolInterface $cache */
        $cache = $container->get('cache');

        $item = $cache->getItem(CachingTracker::CACHE_KEY);
        self::assertFalse($item->isHit());

        self::assertEquals(4, $tracker->doTrack());

        $item = $cache->getItem(CachingTracker::CACHE_KEY);
        self::assertTrue($item->isHit());
    }

    abstract protected function configureContainer(ContainerBuilder $builder);

    private function getContainer(bool $logger = false, bool $cache = false): ContainerInterface
    {
        $builder = new ContainerBuilder();

        if ($logger) {
            $builder->set('logger', $this->createLogger());
        }

        if ($cache) {
            $builder->set('cache', $this->createCache());
        }

        $builder->register('tracker', BasicTracker::class);

        $this->configureContainer($builder);
        $builder->compile();

        return $builder;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|LoggerInterface
     */
    private function createLogger()
    {
        $mock = $this->createMock(LoggerInterface::class);

        $mock->expects(self::exactly(2))->method('info');

        return $mock;
    }

    private function createCache(): CacheItemPoolInterface
    {
        return new SimpleCacheAdapter(new ArrayCache());
    }
}
