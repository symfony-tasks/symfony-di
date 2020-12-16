<?php

namespace SymfonyTasks\DI\Common\Tracker;

use SymfonyTasks\DI\Common\TrackerInterface;

final class BasicTracker implements TrackerInterface
{
    public function doTrack(): int
    {
        return 4;
    }
}
