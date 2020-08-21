<?php

namespace WpUpdater\Tests;

use WpUpdater\Tests\WpUpdaterFactory;
use PHPUnit\Framework\TestCase;

/**
 * WP Updater test case
 */
class WpUpdaterTestCase extends TestCase
{
    /**
     * Updater instance
     *
     * @var Updater
     */
    protected $wpUpdater;

    /**
     * Set up
     *
     * @return void
     */
    public function setUp(): void
    {
        $this->wpUpdater = WpUpdaterFactory::create();
    }
}
