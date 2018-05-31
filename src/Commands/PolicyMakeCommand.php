<?php

namespace GML\LaravelMake\Commands;

use Illuminate\Foundation\Console\PolicyMakeCommand as BasePolicyMakeCommand;

class PolicyMakeCommand extends BasePolicyMakeCommand
{
    use GetCurrentPath;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'policy';
}
