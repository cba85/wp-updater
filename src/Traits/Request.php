<?php

namespace WpUpdater\Traits;

/**
 * Request trait
 */
trait Request
{
    /**
     * Updater uri
     *
     * @var string
     */
    protected $uri;

    /**
     * Create request uri
     *
     * @return void
     */
    protected function createRequestUri()
    {
        if (!empty($this->parameters)) {
            $query = http_build_query($this->parameters);
            $this->uri = "{$this->url}?{$query}";
            return;
        }

        $this->uri = $this->url;
    }
}
