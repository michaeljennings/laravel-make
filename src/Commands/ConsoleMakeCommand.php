<?php

namespace GML\LaravelMake\Commands;

use Illuminate\Foundation\Console\ConsoleMakeCommand as BaseConsoleMakeCommand;

class ConsoleMakeCommand extends BaseConsoleMakeCommand
{
    use GetCurrentPath;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'command';
}
