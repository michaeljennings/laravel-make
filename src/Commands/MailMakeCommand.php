<?php

namespace GML\LaravelMake\Commands;

use Illuminate\Foundation\Console\MailMakeCommand as BaseMailMakeCommand;

class MailMakeCommand extends BaseMailMakeCommand
{
    use GetCurrentPath;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'mail';
}
