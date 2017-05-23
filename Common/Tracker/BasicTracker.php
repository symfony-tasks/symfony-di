<?php

namespace BankiruSchool\DI\Common\Tracker;

use BankiruSchool\DI\Common\TrackerInterface;

final class BasicTracker implements TrackerInterface
{
    /** {@inheritdoc} */
    public function doTrack(): int
    {
        return 4;
    }
}
