<?php

namespace WpUpdater\Tests;

use WpUpdater\Tests\WpUpdaterTestCase;

final class TransientTest extends WpUpdaterTestCase
{
    /**
     * Test get transient
     *
     * @return void
     */
    public function testGetTransient()
    {
        $transient = $this->wpUpdater->getTransient('wp-updater-plugin');

        // Get transient
        $this->assertFalse($transient);

        // Uncomment (and comment the line above) the following lines to get remote
        /*
        $this->assertIsArray($transient);
        $this->assertArrayHasKey('body', $transient);
        $this->assertIsArray($transient['response']);
        $this->assertArrayHasKey('code', $transient['response']);
        */
    }
}
