<?php

namespace SymfonyTasks\DI\Common\Tracker;

use SymfonyTasks\DI\Common\TrackerInterface;
use Psr\Log\LoggerInterface;

final class LoggingTracker implements TrackerInterface
{
    private TrackerInterface $tracker;

    private LoggerInterface $logger;

    public function __construct(TrackerInterface $tracker, LoggerInterface $logger)
    {
        $this->tracker = $tracker;
        $this->logger = $logger;
    }

    public function doTrack(): int
    {
        $this->logger->info('before tracking');
        $result = $this->tracker->doTrack();
        $this->logger->info('after tracking');

        return $result;
    }
}
