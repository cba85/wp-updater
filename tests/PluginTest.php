<?php

namespace WpUpdater\Tests;

use WpUpdater\Tests\WpUpdaterTestCase;

final class PluginTest extends WpUpdaterTestCase
{
    /**
     * Check last version information using wrong action
     *
     * @return void
     */
    public function testCheckLastVersionInformationUsingWrongAction()
    {
        $version = $this->wpUpdater->checkLastVersionInformation(null, 'error', []);
        $this->assertFalse($version);
    }

    /**
     * Check last version information using wrong args
     *
     * @return void
     */
    public function testCheckLastVersionInformationUsingWrongArgs()
    {
        $version = $this->wpUpdater->checkLastVersionInformation(null, 'plugin_information', []);
        $this->assertFalse($version);
    }

    /**
     * Check last version information  using incorrect slug
     *
     * @return void
     */
    public function testCheckLastVersionInformationUsingIncorrectSlug()
    {
        $version = $this->wpUpdater->checkLastVersionInformation(null, 'plugin_information', ['slug' => 'error']);
        $this->assertFalse($version);
    }

    /**
     * Check last version information  using correct slug
     *
     * @return void
     */
    public function testCheckLastVersionInformationUsingCorrectSlug()
    {
        $version = $this->wpUpdater->checkLastVersionInformation(null, 'plugin_information', ['slug' => 'wp-plugin']);
        $this->assertFalse($version);
    }
}
