<?php

namespace WpUpdater\Tests;

use PHPUnit\Framework\TestCase;
use WpUpdater\Updater;

final class TransientTest extends TestCase
{
    /**
     * Test get transient
     *
     * @return void
     */
    public function testGetTransient()
    {
        $wpUpdater = new Updater(
            'http://0.0.0.0:8080',
            'wp-updater-plugin',
            'wp-plugin',
            '1.0.0',
            []
        );

        $transient = $wpUpdater->getTransient('wp-updater-plugin');

        // Get transient
        //$this->assertFalse($transient);

        // Uncomment (and comment the line above) the following lines to get remote
        $this->assertIsArray($transient);
        $this->assertArrayHasKey('body', $transient);
        $this->assertIsArray($transient['response']);
        $this->assertArrayHasKey('code', $transient['response']);
    }
}
