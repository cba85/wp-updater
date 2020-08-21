<?php

namespace WpUpdater\Tests;

use WpUpdater\Tests\WpUpdaterTestCase;

final class ResponseTest extends WpUpdaterTestCase
{
    /**
     * Create request uri without any parameters
     *
     * @return void
     */
    public function testParseResponse()
    {
        $remote['body'] = file_get_contents(__DIR__ . '/data/remote.json');
        $response = $this->wpUpdater->parseResponse($remote);

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

    /**
     * Create transient response
     *
     * @return void
     */
    public function testCreateTransientResponse()
    {
        $remote = json_decode(file_get_contents(__DIR__ . '/data/remote.json'));
        $response = $this->wpUpdater->createTransientResponse($remote);

        $this->assertIsObject($response);
        $this->assertObjectHasAttribute('slug', $response);
        $this->assertEquals('wp-plugin', $response->slug);
        $this->assertObjectHasAttribute('plugin', $response);
        $this->assertEquals('plugin/wp-plugin.php', $response->plugin);
        $this->assertObjectHasAttribute('new_version', $response);
        $this->assertEquals('1.1.0', $response->new_version);
        $this->assertObjectHasAttribute('tested', $response);
        $this->assertEquals('4.8.1', $response->tested);
        $this->assertObjectHasAttribute('package', $response);
        $this->assertEquals('https://rudrastyh.com/wp-content/uploads/misha-test-updater.zip', $response->package);
        $this->assertObjectHasAttribute('compatibility', $response);
        $this->assertIsObject($response->compatibility);
    }
}
