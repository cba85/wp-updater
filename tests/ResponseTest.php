<?php

namespace WpUpdater\Tests;

use PHPUnit\Framework\TestCase;
use WpUpdater\Updater;

final class ResponseTest extends TestCase
{
    /**
     * Create request uri without any parameters
     *
     * @return void
     */
    public function testParseResponse()
    {
        $wpUpdater = new Updater(
            'http://0.0.0.0:8080',
            'wp-updater-plugin',
            'wp-plugin',
            '1.0.0',
            []
        );

        $remote['body'] = file_get_contents(__DIR__ . '/data/remote.json');
        $response = $wpUpdater->parseResponse($remote);

        $this->assertIsObject($response);
        $this->assertObjectHasAttribute('name', $response);
        $this->assertObjectHasAttribute('slug', $response);
        $this->assertObjectHasAttribute('version', $response);
        $this->assertObjectHasAttribute('tested', $response);
        $this->assertObjectHasAttribute('requires', $response);
        $this->assertObjectHasAttribute('author', $response);
        $this->assertObjectHasAttribute('author_profile', $response);
        $this->assertObjectHasAttribute('download_link', $response);
        $this->assertObjectHasAttribute('trunk', $response);
        $this->assertObjectHasAttribute('last_updated', $response);
        $this->assertObjectHasAttribute('sections', $response);
        $this->assertIsArray($response->sections);
        $this->assertArrayHasKey('description', $response->sections);
        $this->assertArrayHasKey('installation', $response->sections);
        $this->assertArrayHasKey('changelog', $response->sections);
    }
}
