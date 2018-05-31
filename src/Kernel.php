<?php

namespace GML\LaravelMake;

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
        ConsoleMakeCommand::class,
        ControllerMakeCommand::class,
        EventMakeCommand::class,
        JobMakeCommand::class,
        ListenerMakeCommand::class,
        MailMakeCommand::class,
        MiddlewareMakeCommand::class,
        MigrateMakeCommand::class,
        ModelMakeCommand::class,
        NotificationMakeCommand::class,
        PolicyMakeCommand::class,
        ProviderMakeCommand::class,
        RequestMakeCommand::class,
        SeederMakeCommand::class,
        TestMakeCommand::class,
    ];

    /**
     * The bootstrap classes for the application.
     *
     * @var array
     */
    protected $bootstrappers = [];

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        //
    }

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
        throw $e;
    }
}