<?php

namespace MichaelJennings\LaravelMake;

use Exception;
use GML\LaravelMake\Commands\ConsoleMakeCommand;
use GML\LaravelMake\Commands\ControllerMakeCommand;
use GML\LaravelMake\Commands\EventMakeCommand;
use GML\LaravelMake\Commands\JobMakeCommand;
use GML\LaravelMake\Commands\ListenerMakeCommand;
use GML\LaravelMake\Commands\MailMakeCommand;
use GML\LaravelMake\Commands\MiddlewareMakeCommand;
use GML\LaravelMake\Commands\MigrateMakeCommand;
use GML\LaravelMake\Commands\ModelMakeCommand;
use GML\LaravelMake\Commands\NotificationMakeCommand;
use GML\LaravelMake\Commands\PolicyMakeCommand;
use GML\LaravelMake\Commands\ProviderMakeCommand;
use GML\LaravelMake\Commands\RequestMakeCommand;
use GML\LaravelMake\Commands\SeederMakeCommand;
use GML\LaravelMake\Commands\TestMakeCommand;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
    ];

    /**
     * The bootstrap classes for the application.
     *
     * @var array
     */
    protected $bootstrappers = [];

    /**
     * Report the exception to the exception handler.
     *
     * @param  \Exception  $e
     * @return void
     */
    protected function reportException(Exception $e)
    {
        dd($e);
    }

    /**
     * Report the exception to the exception handler.
     *
     * @param  \Symfony\Component\Console\Output\OutputInterface  $output
     * @param  \Exception  $e
     * @return void
     */
    protected function renderException($output, Exception $e)
    {
        dd($e);
    }
}
