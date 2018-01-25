<?php

namespace SymfonyTasks\DI\Common\Tracker;

use SymfonyTasks\DI\Common\TrackerInterface;
use Psr\Cache\CacheItemPoolInterface;

final class CachingTracker implements TrackerInterface
{
    const CACHE_KEY = 'tracker_key';
    /** @var TrackerInterface */
    private $tracker;
    /** @var CacheItemPoolInterface */
    private $cache;

    /**
     * CachingTracker constructor.
     *
     * @param TrackerInterface       $tracker
     * @param CacheItemPoolInterface $cache
     */
    public function __construct(TrackerInterface $tracker, CacheItemPoolInterface $cache)
    {
        $this->tracker = $tracker;
        $this->cache   = $cache;
    }

    /** {@inheritdoc} */
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
