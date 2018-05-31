<?php

namespace GML\LaravelMake\Commands;

use Illuminate\Foundation\Console\ListenerMakeCommand as BaseListenerMakeCommand;

class ListenerMakeCommand extends BaseListenerMakeCommand
{
    use GetCurrentPath;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'listener';
}
