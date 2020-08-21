<?php

namespace WpUpdater\Tests;

use WpUpdater\Tests\WpUpdaterTestCase;

final class WpUpdaterTest extends WpUpdaterTestCase
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
            'pluginFilePath' => 'plugin/wp-plugin.php',
            'parameters' => []
        ];

        $this->assertEquals($options['url'], $this->wpUpdater->getUrl());
        $this->assertEquals($options['transientName'], $this->wpUpdater->getTransientName());
        $this->assertEquals($options['pluginSlug'], $this->wpUpdater->getPluginSlug());
        $this->assertEquals($options['currentVersion'], $this->wpUpdater->getCurrentVersion());
        $this->assertEquals($options['parameters'], $this->wpUpdater->getParameters());
    }
}
