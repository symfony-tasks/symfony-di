<?php

namespace SymfonyTasks\DI\Common\Tracker;

use Psr\Cache\InvalidArgumentException;
use SymfonyTasks\DI\Common\TrackerInterface;
use Psr\Cache\CacheItemPoolInterface;

final class CachingTracker implements TrackerInterface
{
    public const CACHE_KEY = 'tracker_key';

    private TrackerInterface $tracker;

    private CacheItemPoolInterface $cache;

    public function __construct(TrackerInterface $tracker, CacheItemPoolInterface $cache)
    {
        $this->tracker = $tracker;
        $this->cache = $cache;
    }

    /**
     * @throws InvalidArgumentException
     */
    public function doTrack(): int
    {
        $item = $this->cache->getItem(self::CACHE_KEY);
        if (!$item->isHit()) {
            $item->set($this->tracker->doTrack());
            $this->cache->save($item);
        }

        return (int)$item->get();
    }
}
