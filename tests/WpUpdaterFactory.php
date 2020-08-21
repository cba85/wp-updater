<?php

namespace WpUpdater\Tests;

use WpUpdater\Updater;

/**
 * WP Updater factory
 */
class WpUpdaterFactory
{
    /**
     * Create a WP Updater instance
     *
     * @var array $options optional
     * @return object
     */
    public static function create()
    {
        $options = [
            'url' => 'http://0.0.0.0:8080',
            'transientName' => 'wp-updater-plugin',
            'pluginSlug' => 'wp-plugin',
            'currentVersion' => '1.0.0',
            'pluginFilePath' => 'plugin/wp-plugin.php',
            'parameters' => []
        ];

        return new Updater(
            $options['url'],
            $options['transientName'],
            $options['pluginSlug'],
            $options['currentVersion'],
            $options['pluginFilePath'],
            $options['parameters'],
        );
    }
}
