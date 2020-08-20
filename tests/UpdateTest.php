<?php

namespace WpUpdater\Tests;

use PHPUnit\Framework\TestCase;
use WpUpdater\Updater;
use stdClass;

final class UpdateTest extends TestCase
{
    /**
     * Push update without transient
     *
     * @return void
     */
    public function testPushUpdateWithoutTransient()
    {
        $wpUpdater = new Updater(
            'http://0.0.0.0:8080',
            'wp-updater-plugin',
            'wp-plugin',
            '1.0.0',
            []
        );

        $transient = null;
        $update = $wpUpdater->pushUpdate($transient);

        $this->assertNull($update);
    }

    /**
     * Push update with transient
     *
     * @return void
     */
    public function testPushUpdateWithTransient()
    {
        $wpUpdater = new Updater(
            'http://0.0.0.0:8080',
            'wp-updater-plugin',
            'wp-plugin',
            '1.0.0',
            []
        );

        $transient = new stdClass;
        $transient->checked = true;

        $update = $wpUpdater->pushUpdate($transient);

        print_r($update);
    }
}
