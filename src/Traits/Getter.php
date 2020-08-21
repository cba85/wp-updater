<?php

namespace WpUpdater\Traits;

/**
 * Getter trait
 */
trait Getter
{
    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get transient name
     *
     * @return string
     */
    public function getTransientName()
    {
        return $this->transientName;
    }

    /**
     * Get plugin slug
     *
     * @return string
     */
    public function getPluginSlug()
    {
        return $this->pluginSlug;
    }

    /**
     * Get parameters
     *
     * @return string
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Get current version
     *
     * @return string
     */
    public function getCurrentVersion()
    {
        return $this->currentVersion;
    }

    /**
     * Get uri
     *
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * Get plugin file path
     *
     * @return string
     */
    public function getPluginFilePath()
    {
        return $this->pluginFilePath;
    }
}
