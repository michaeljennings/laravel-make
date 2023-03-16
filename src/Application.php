<?php

namespace MichaelJennings\LaravelMake;

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
        try {
            parent::getNamespace();
        } catch (RuntimeException $e) {
            // Else set the namespace to the default
            return $this->namespace = 'App';
        }
    }
}
