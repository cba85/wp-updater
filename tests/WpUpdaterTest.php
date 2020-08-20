<?php

namespace WpUpdater\Tests;

use PHPUnit\Framework\TestCase;
use WpUpdater\Updater;

final class WpUpdaterTest extends TestCase
{
    /**
     * Test Wp Updater instanciation
     *
     * @return void
     */
    public function testInstanciation()
    {
        $options = [
            'url' => 'http://0.0.0.0:8080',
            'transientName' => 'wp-updater-plugin',
            'pluginSlug' => 'wp-plugin',
            'currentVersion' => '1.0.0',
            'parameters' => []
        ];

        $wpUpdater = new Updater(
            $options['url'],
            $options['transientName'],
            $options['pluginSlug'],
            $options['currentVersion'],
            $options['parameters'],
        );

        $this->assertEquals($options['url'], $wpUpdater->getUrl());
        $this->assertEquals($options['transientName'], $wpUpdater->getTransientName());
        $this->assertEquals($options['pluginSlug'], $wpUpdater->getPluginSlug());
        $this->assertEquals($options['currentVersion'], $wpUpdater->getCurrentVersion());
        $this->assertEquals($options['parameters'], $wpUpdater->getParameters());
    }
}
