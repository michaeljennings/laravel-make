<?php

namespace MichaelJennings\LaravelMake;

use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use MichaelJennings\LaravelMake\Console\Application as Artisan;

class Kernel extends ConsoleKernel
{
    /**
     * {@inheritdoc}
     */
    protected function getArtisan()
    {
        if (is_null($this->artisan)) {
            $this->artisan = (new Artisan($this->app, $this->events, $this->app->version()))
                ->resolveCommands($this->commands)
                ->setContainerCommandLoader();
        }

        return $this->artisan;
    }

    /**
     * {@inheritdoc}
     */
    protected function reportException(\Throwable $e)
    {
        dd($e, __FILE__ . ':' . __LINE__);
    }
}
