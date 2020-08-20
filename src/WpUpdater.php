<?php

namespace WpUpdater;

use WpUpdater\Traits\Getters;
use WpUpdater\Traits\Plugin;
use WpUpdater\Traits\Remote;
use WpUpdater\Traits\Request;
use WpUpdater\Traits\Response;
use WpUpdater\Traits\Transient;
use WpUpdater\Traits\Update;

/**
 * WP Updater class
 */
class Updater
{
    use Getters;
    use Plugin;
    use Remote;
    use Request;
    use Response;
    use Transient;
    use Update;

    /**
     * Updater url
     *
     * @var string
     */
    protected $url;

    /**
     * Plugin transient name
     *
     * @var string
     */
    protected $transientName;

    /**
     * Plugin slug
     *
     * @var string
     */
    protected $pluginSlug;

    /**
     * Plugin current version
     *
     * @var string
     */
    protected $currentVersion;

    /**
     * Updater parameters
     *
     * @var array
     */
    protected $parameters = [];

    /**
     * Constructor
     */
    public function __construct(string $url, string $transientName, string $pluginSlug, string $currentVersion, array $parameters = [])
    {
        $this->url = $url;
        $this->transientName = $transientName;
        $this->pluginSlug = $pluginSlug;
        $this->parameters = $parameters;
        $this->currentVersion = $currentVersion;
        $this->createRequestUri();
        return $this;
    }

    /**
     * Launch update
     *
     * @return void
     */
    public function update()
    {
        // https://developer.wordpress.org/reference/hooks/plugins_api/
        // https://developer.wordpress.org/reference/functions/plugins_api/
        add_filter('plugins_api', [$this, 'checkLastVersionInformation'], 20, 3);

        add_filter('site_transient_update_plugins', [$this, 'pushUpdate']);

        add_action('upgrader_process_complete', [$this, 'afterUpdateComplete'], 10, 2);
    }
}
