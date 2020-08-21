<?php

namespace WpUpdater\Tests;

use PHPUnit\Framework\TestCase;
use WpUpdater\Updater;

final class RequestTest extends TestCase
{
    /**
     * Create request uri without any parameters
     *
     * @return void
     */
    public function testCreateRequestUriWithoutParameters()
    {
        $url = 'http://0.0.0.0:8080';

        $wpUpdater = new Updater(
            $url,
            'wp-updater-plugin',
            'wp-plugin',
            '1.0.0',
            'plugin/wp-plugin.php',
            []
        );

        $this->assertEquals($url, $wpUpdater->getUri());
    }

    /**
     * Create request uri with any parameters
     *
     * @return void
     */
    public function testCreateRequestUriWithParameters()
    {
        $url = 'http://0.0.0.0:8080';
        $parameters = [
            'test' => 'ok'
        ];

        $wpUpdater = new Updater(
            $url,
            'wp-updater-plugin',
            'wp-plugin',
            '1.0.0',
            'plugin/wp-plugin.php',
            $parameters
        );

        $this->assertEquals("{$url}?test=ok", $wpUpdater->getUri());
    }
}
