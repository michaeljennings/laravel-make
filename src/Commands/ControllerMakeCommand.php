<?php

namespace GML\LaravelMake\Commands;

use Illuminate\Routing\Console\ControllerMakeCommand as BaseControllerMakeCommand;

class ControllerMakeCommand extends BaseControllerMakeCommand
{
    use GetCurrentPath;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'controller';
}