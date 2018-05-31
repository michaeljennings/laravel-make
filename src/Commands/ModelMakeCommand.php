<?php

namespace GML\LaravelMake\Commands;

use Illuminate\Foundation\Console\ModelMakeCommand as BaseModelMakeCommand;

class ModelMakeCommand extends BaseModelMakeCommand
{
    use GetCurrentPath;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'model';
}
