<?php

namespace WpUpdater\Traits;

/**
 * Remote trait
 */
trait Remote
{
    /**
     * Get last version information
     *
     * @return string
     */
    public function getLastVersionInformation()
    {
        return wp_remote_get($this->uri, [
            'timeout' => 10,
            'headers' => ['Accept' => 'application/json']
        ]);
    }
}
