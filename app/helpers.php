<?php


/*
 * Global helpers file with misc functions.
 */

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
/*
 * Add this line include 'app/helpers.php';
 * To /vendor/laravel/framework/src/Illuminate/Support/helpers.php
 */


if (! function_exists('app_name')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}


if (! function_exists('home_route')) {

    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function home_route()
    {
        if (auth()->check()) {
            if (auth()->user()->can('view backend')) {
                return 'admin.dashboard';
            } else {
                return 'frontend.user.dashboard';
            }
        }

        return 'frontend.index';
    }
}


if (! function_exists('studly_case')) {
    /**
     * Convert a value to studly caps case.
     *
     * @param  string  $value
     * @return string
     */
    function studly_case($value)
    {
        return Str::studly($value);
    }
}


if (! function_exists('str_plural')) {
    /**
     * Get the plural form of an English word.
     *
     * @param  string  $value
     * @param  int     $count
     * @return string
     */
    function str_plural($value, $count = 2)
    {
        return Str::plural($value, $count);
    }
}

if (! function_exists('snake_case')) {
    /**
     * Convert a string to snake case.
     *
     * @param  string  $value
     * @param  string  $delimiter
     * @return string
     */
    function snake_case($value, $delimiter = '_')
    {
        return Str::snake($value, $delimiter);
    }
}

if (! function_exists('writeToLog')) {

    /**
     * Write custom messages to Log
     *
     * @param $logMessage
     * @param string $logType
     * @return \Illuminate\Config\Repository|mixed
     */
    function writeToLog($logMessage, $logType = 'error')
    {
        try {
            $allLogTypes = ['alert', 'critical', 'debug', 'emergency', 'error', 'info'];

            $logType = strtolower($logType);

            if (in_array($logType, $allLogTypes)) {
                Log::$logType($logMessage);
            }
        } catch (Exception $exception) {
            //
        }
    }
}
