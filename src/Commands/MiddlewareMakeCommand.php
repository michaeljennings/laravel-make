<?php

namespace GML\LaravelMake\Commands;

use Illuminate\Routing\Console\MiddlewareMakeCommand as BaseMiddlewareMakeCommand;

class MiddlewareMakeCommand extends BaseMiddlewareMakeCommand
{
    use GetCurrentPath;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'middleware';
}