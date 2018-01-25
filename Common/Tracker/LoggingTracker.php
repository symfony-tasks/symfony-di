<?php

namespace SymfonyTasks\DI\Common\Tracker;

use SymfonyTasks\DI\Common\TrackerInterface;
use Psr\Log\LoggerInterface;

final class LoggingTracker implements TrackerInterface
{
    /** @var TrackerInterface */
    private $tracker;
    /** @var LoggerInterface */
    private $logger;

    /**
     * LoggingTracker constructor.
     *
     * @param TrackerInterface $tracker
     * @param LoggerInterface  $logger
     */
    public function __construct(TrackerInterface $tracker, LoggerInterface $logger)
    {
        $this->tracker = $tracker;
        $this->logger  = $logger;
    }

    /** {@inheritdoc} */
    public function doTrack(): int
    {
        $this->logger->info('before tracking');
        $result = $this->tracker->doTrack();
        $this->logger->info('after tracking');

        return $result;
    }
}
