<?php

namespace MichaelJennings\LaravelMake;

use Illuminate\Foundation\Application as BaseApplication;
use Symfony\Component\Console\Input\ArgvInput;

class Application extends BaseApplication
{
    /**
     * {@inheritdoc}
     */
    public function getNamespace(): string
    {
        $group = (new ArgvInput)->getFirstArgument();

        return Config::getNamespace($group) ?: 'App';
    }
}
