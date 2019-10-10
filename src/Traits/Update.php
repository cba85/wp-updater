<?php

namespace WpUpdater\Traits;

trait Update
{
    /**
     * Push plugin update
     *
     * @param array $transient
     * @return array
     */
    public function pushUpdate($transient)
    {

        if (empty($transient->checked)) {
            return $transient;
        }

        //TODO: Vérifier changement
        if (!$remote = $this->getTransient()) {
            return $transient;
        }

        $remote = json_decode($remote['body']);
        if ($remote and version_compare($this->currentVersion, $remote->version, '<') and version_compare($remote->requires, get_bloginfo('version'), '<')) {
            $response = $this->createTransientResponse($remote);
            $transient->response[$response->plugin] = $response;
        }

        return $transient;
    }

    /**
     * Clean cache after plugin update complete
     *
     * @param object $upgraderObject
     * @param array $options
     * @return void
     */
    public function afterUpdateComplete($upgraderObject, $options)
    {
        if ($options['action'] == 'update' and $options['type'] == 'plugin') {
            delete_transient($this->transientName);
        }
    }
}