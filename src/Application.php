<?php

namespace GML\LaravelMake;

use RunTimeException;
use Illuminate\Foundation\Application as BaseApplication;

class Application extends BaseApplication
{
    /**
     * The console application bootstrappers.
     *
     * @var array
     */
    protected static $bootstrappers = [];

    /**
     * Get the application namespace.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    public function getNamespace()
    {
        if (! is_null($this->namespace)) {
            return $this->namespace;
        }

        // Check if we are in the root of a laravel application.
        if (file_exists(getcwd() . 'composer.json')) {
            $composer = json_decode(file_get_contents(getcwd() . 'composer.json'), true);

            foreach ((array)data_get($composer, 'autoload.psr-4') as $namespace => $path) {
                foreach ((array)$path as $pathChoice) {
                    if (realpath(app_path()) == realpath(base_path() . '/' . $pathChoice)) {
                        return $this->namespace = $namespace;
                    }
                }
            }
        }

        // Else set the namespace to the default
        return $this->namespace = 'App';
    }
}