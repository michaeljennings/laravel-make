<?php

namespace GML\LaravelMake\Commands;

use Illuminate\Foundation\Console\TestMakeCommand as BaseTestMakeCommand;

class TestMakeCommand extends BaseTestMakeCommand
{
    use GetCurrentPath;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'test {name : The name of the class} {--unit : Create a unit test}';
}
