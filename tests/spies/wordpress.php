<?php

/**
 * Wordpress spies
 */


if (!function_exists('add_filter')) {
    function add_filter(string $tag, array $function_to_add, int $priority = 10, int $accepted_args = 1)
    {
        $args = new stdClass;
        $args->slug = "wp-plugin";

        $transient = new stdClass;
        $transient->checked = true;

        call_user_func_array($function_to_add, [$transient, 'plugin_information', $args]);
    }
}

if (!function_exists('get_transient')) {
    function get_transient(string $transient)
    {
        // Uncomment to check remote information
        return false;

        // Simulate a transient retrievement
        return [
            'response' => [
                'code' => 200
            ],
            'body' => [
                'version' => "1.0.1",
                'requires' => "5.0.2"
            ]
        ];
    }
}

// https://developer.wordpress.org/reference/classes/wp_http/
if (!function_exists('is_wp_error')) {
    function is_wp_error($remote)
    {
        return false;
    }
}

if (!function_exists('set_transient')) {
    function set_transient($transient, $value, $expiration)
    {
        return true;
    }
}

if (!function_exists('wp_remote_get')) {
    function wp_remote_get($url, $args)
    {
        return [
            'body' => file_get_contents(__DIR__ . '/../data/remote.json'),
            'response' => [
                'code' => 200,
            ],
        ];
    }
}

if (!function_exists('delete_transient')) {
    function delete_transient($name)
    {
        return true;
    }
}

if (!function_exists('add_action')) {
    function add_action(string $tag, callable $function_to_add, int $priority = 10, int $accepted_args = 1)
    {
        $upgraderObject = new StdClass;

        $options = [
            'action' => 'update',
            'type' => 'plugin'
        ];

        call_user_func_array($function_to_add, [$upgraderObject, $options]);
    }

    // https://developer.wordpress.org/reference/functions/get_bloginfo/
    if (!function_exists('get_bloginfo')) {
        function get_bloginfo(string $show = '', string $filter = 'raw')
        {
            // Return "version" show parameter only
            return '5.5';
        }
    }
}
