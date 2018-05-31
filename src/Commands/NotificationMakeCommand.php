<?php

namespace GML\LaravelMake\Commands;

use Illuminate\Foundation\Console\NotificationMakeCommand as BaseNotificationMakeCommand;

class NotificationMakeCommand extends BaseNotificationMakeCommand
{
    use GetCurrentPath;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'notification';
}
