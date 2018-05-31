<?php

namespace GML\LaravelMake\Commands;

use Illuminate\Foundation\Console\RequestMakeCommand as BaseRequestMakeCommand;

class RequestMakeCommand extends BaseRequestMakeCommand
{
    use GetCurrentPath;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'request';
}
