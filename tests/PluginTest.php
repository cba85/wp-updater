<?php

namespace WpUpdater\Tests;

use PHPUnit\Framework\TestCase;
use WpUpdater\Updater;

final class PluginTest extends TestCase
{
    /**
     * Check last version information using wrong action
     *
     * @return void
     */
    public function testCheckLastVersionInformationUsingWrongAction()
    {
        $wpUpdater = new Updater(
            'http://0.0.0.0:8080',
            'wp-updater-plugin',
            'wp-plugin',
            '1.0.0',
            []
        );

        $version = $wpUpdater->checkLastVersionInformation(null, 'error', []);

        $this->assertFalse($version);
    }

    /**
     * Check last version information using wrong args
     *
     * @return void
     */
    public function testCheckLastVersionInformationUsingWrongArgs()
    {
        $wpUpdater = new Updater(
            'http://0.0.0.0:8080',
            'wp-updater-plugin',
            'wp-plugin',
            '1.0.0',
            []
        );

        $version = $wpUpdater->checkLastVersionInformation(null, 'plugin_information', []);

        $this->assertFalse($version);
    }

    /**
     * Check last version information  using incorrect slug
     *
     * @return void
     */
    public function testCheckLastVersionInformationUsingIncorrectSlug()
    {
        $wpUpdater = new Updater(
            'http://0.0.0.0:8080',
            'wp-updater-plugin',
            'wp-plugin',
            '1.0.0',
            []
        );

        $version = $wpUpdater->checkLastVersionInformation(null, 'plugin_information', ['slug' => 'error']);

        $this->assertFalse($version);
    }

    /**
     * Check last version information  using correct slug
     *
     * @return void
     */
    public function testCheckLastVersionInformationUsingCorrectSlug()
    {
        $wpUpdater = new Updater(
            'http://0.0.0.0:8080',
            'wp-updater-plugin',
            'wp-plugin',
            '1.0.0',
            []
        );

        $version = $wpUpdater->checkLastVersionInformation(null, 'plugin_information', ['slug' => 'wp-plugin']);

        $this->assertFalse($version);
    }
}
