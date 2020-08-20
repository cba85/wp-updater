<?php

namespace WpUpdater\Traits;

/**
 * Plugin trait
 */
trait Plugin
{
    /**
     * Get last update plugin information
     *
     * @param bool|object|array $result
     * @param string $action
     * @param object $args
     * @return StdClass
     */
    public function checkLastVersionInformation($result, $action, $args)
    {
        if ($action != 'plugin_information' or empty($args->slug) or (isset($args->slug) and $args->slug != $this->pluginSlug)) {
            return false;
        }

        if (!$remote = $this->getTransient()) {
            return false;
        }

        return $this->parseResponse($remote);
    }
}
