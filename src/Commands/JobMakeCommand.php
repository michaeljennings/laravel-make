<?php

namespace GML\LaravelMake\Commands;

use Illuminate\Foundation\Console\JobMakeCommand as BaseJobMakeCommand;

class JobMakeCommand extends BaseJobMakeCommand
{
    use GetCurrentPath;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'job';
}
