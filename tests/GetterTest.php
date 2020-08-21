<?php

namespace WpUpdater\Tests;

use WpUpdater\Tests\WpUpdaterTestCase;

final class GetterTest extends WpUpdaterTestCase
{
    /**
     * Get url
     *
     * @return void
     */
    public function testGetUrl()
    {
        $url = 'http://0.0.0.0:8080';
        $this->assertEquals($url, $this->wpUpdater->getUrl());
    }

    /**
     * Get transient name
     *
     * @return void
     */
    public function testGetTransientName()
    {
        $transientName = 'wp-updater-plugin';
        $this->assertEquals($transientName, $this->wpUpdater->getTransientName());
    }

    /**
     * Get plugin slug
     *
     * @return void
     */
    public function testGetPluginSlug()
    {
        $pluginSlug = 'wp-plugin';
        $this->assertEquals($pluginSlug, $this->wpUpdater->getPluginSlug());
    }

    /**
     * Get parameters
     *
     * @return void
     */
    public function testGetParameters()
    {
        $parameters = [];
        $this->assertEquals($parameters, $this->wpUpdater->getParameters());
    }

    /**
     * Get current version
     *
     * @return void
     */
    public function testGetCurrentVersion()
    {
        $currentVersion = '1.0.0';
        $this->assertEquals($currentVersion, $this->wpUpdater->getCurrentVersion());
    }
}
