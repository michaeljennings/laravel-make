<?php

namespace GML\LaravelMake\Commands;

use Illuminate\Database\Console\Seeds\SeederMakeCommand as BaseSeederMakeCommand;

class SeederMakeCommand extends BaseSeederMakeCommand
{
    use ReplaceNamespace;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'seeder';

    /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        if ($path = $this->getConfig('SEEDER_PATH')) {
            return getcwd() . DIRECTORY_SEPARATOR . $this->trimPath($path) . DIRECTORY_SEPARATOR . $name . '.php';
        }

        return getcwd() . 'database/seeds/'.$name.'.php';
    }
}