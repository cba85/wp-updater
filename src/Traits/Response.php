<?php

namespace WpUpdater\Traits;

use stdClass;

trait Response
{
    /**
     * Parse response
     *
     * @param array $remote
     * @return stdClass
     */
    public function parseResponse($remote)
    {
        $body = json_decode($remote['body']);

        $response = new stdClass;
        $response->name = $body->name;
        $response->slug = $this->pluginSlug;
        $response->version = $body->version;
        $response->tested = $body->tested;
        $response->requires = $body->requires;
        $response->author = $body->author;
        $response->author_profile = $body->author_homepage;
        $response->download_link = $body->download_url;
        $response->trunk = $body->download_url;
        $response->last_updated = $body->last_updated;

        $response->sections = [
            'description' => $body->sections->description,
            'installation' => $body->sections->installation,
            'changelog' => $body->sections->changelog,
        ];

        if (!empty($body->sections->screenshots)) {
            $response->sections['screenshots'] = $body->sections->screenshots;
        }

        if (!empty($body->banners)) {
            $response->banners = [
                'low' => $body->banners->low,
                'high' => $body->banners->high
            ];
        }

        return $response;
    }

    /**
     * Create transient response object
     *
     * @param object $remote
     * @return StdClass
     */
    public function createTransientResponse($remote)
    {
        $response = new stdClass;
        $response->slug = $this->pluginSlug;
        $response->plugin = $this->pluginFilePath;
        $response->new_version = $remote->version;
        $response->tested = $remote->tested;
        $response->package = $remote->download_url;
        $response->compatibility = new stdClass;
        return $response;
    }
}
