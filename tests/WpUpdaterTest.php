<?php
namespace WpUpdater\Tests;

use PHPUnit\Framework\TestCase;
use WpUpdater\Updater;

final class WpUpdaterTest extends TestCase
{
    public function testNothing()
    {
        $parameters = [];

        $wpUpdater = new Updater(
            'http://0.0.0.0:8080',
            'wp-updater-plugin',
            'wp-plugin',
            '1.0.0',
            $parameters
        );
        $wpUpdater->update();

        $this->assertTrue(true);
    }
}
