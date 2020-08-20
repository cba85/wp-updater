<?php

namespace WpUpdater\Traits;

/**
 * Transient trait
 */
trait Transient
{
    /**
     * Transient expiration
     *
     * @var integer
     */
    protected $expiration = 3600;

    /**
     * Get transient expiration
     *
     * @return int
     */
    public function getTransientExpiration()
    {
        return $this->expiration;
    }

    /**
     * Set transient expiration
     *
     * @param integer $secondes
     * @return void
     */
    public function setTransientExpiration(int $secondes)
    {
        $this->expiration = $secondes;
    }

    /**
     * Get transient
     *
     * @return bool|string
     */
    public function getTransient()
    {
        delete_transient($this->transientName);

        if (!get_transient($this->transientName)) {
            $remote = $this->getLastVersionInformation();

            if (!is_wp_error($remote) and isset($remote['response']['code']) and $remote['response']['code'] == 200 and !empty($remote['body'])) {
                set_transient($this->transientName, $remote, $this->expiration);
                return $remote;
            }
        }

        return false;
    }
}
