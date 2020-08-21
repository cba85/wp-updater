<?php

namespace WpUpdater\Tests;

use WpUpdater\Tests\WpUpdaterTestCase;
use stdClass;

final class UpdateTest extends WpUpdaterTestCase
{
    /**
     * Push update without transient
     *
     * @return void
     */
    public function testPushUpdateWithoutTransient()
    {
        $update = $this->wpUpdater->pushUpdate(null);
        $this->assertNull($update);
    }

    /**
     * Push update with transient
     *
     * @return void
     */
    public function testPushUpdateWithTransient()
    {
        $transient = new stdClass;
        $transient->checked = true;
        $update = $this->wpUpdater->pushUpdate($transient);

        // Remote
        $this->assertIsObject($update);
        $this->assertObjectHasAttribute('checked', $update);
        $this->assertEquals(1, $update->checked);
        $this->assertObjectHasAttribute('response', $update);
        $this->assertIsArray($update->response);
        $this->assertArrayHasKey('plugin/wp-plugin.php', $update->response);
        $this->assertIsObject($update->response['plugin/wp-plugin.php']);
        $this->assertObjectHasAttribute('slug', $update->response['plugin/wp-plugin.php']);
        $this->assertEquals('wp-plugin', $update->response['plugin/wp-plugin.php']->slug);
        $this->assertObjectHasAttribute('plugin', $update->response['plugin/wp-plugin.php']);
        $this->assertEquals('plugin/wp-plugin.php', $update->response['plugin/wp-plugin.php']->plugin);
        $this->assertObjectHasAttribute('new_version', $update->response['plugin/wp-plugin.php']);
        $this->assertEquals('1.1.0', $update->response['plugin/wp-plugin.php']->new_version);
        $this->assertObjectHasAttribute('tested', $update->response['plugin/wp-plugin.php']);
        $this->assertEquals('4.8.1', $update->response['plugin/wp-plugin.php']->tested);
        $this->assertObjectHasAttribute('package', $update->response['plugin/wp-plugin.php']);
        $this->assertEquals('https://rudrastyh.com/wp-content/uploads/misha-test-updater.zip', $update->response['plugin/wp-plugin.php']->package);
        $this->assertObjectHasAttribute('compatibility', $update->response['plugin/wp-plugin.php']);
        $this->assertIsObject($update->response['plugin/wp-plugin.php']->compatibility);
    }

    /**
     * After update complete using incorrect options
     *
     * @return void
     */
    public function testAfterUpdateCompleteUsingIncorrectOptions()
    {
        $upgraderObject = new stdClass;
        $options = [];

        $update = $this->wpUpdater->afterUpdateComplete($upgraderObject, $options);
        $this->assertFalse($update);
    }

    /**
     * After update complete using correct options
     *
     * @return void
     */
    public function testAfterUpdateCompleteUsingCorrectOptions()
    {
        $upgraderObject = new stdClass;
        $options = [
            'action' => 'update',
            'type' => 'plugin'
        ];

        $update = $this->wpUpdater->afterUpdateComplete($upgraderObject, $options);
        $this->assertTrue($update);
    }

    /**
     * Update
     *
     * @return void
     */
    public function testUpdate()
    {
        $update = $this->wpUpdater->update();
        $this->assertNull($update);
    }
}
