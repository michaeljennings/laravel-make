<?php

namespace GML\LaravelMake\Commands;

use Illuminate\Foundation\Console\ProviderMakeCommand as BaseProviderMakeCommand;

class ProviderMakeCommand extends BaseProviderMakeCommand
{
    use GetCurrentPath;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'provider';
}
