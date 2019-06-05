<?php

namespace GML\LaravelMake\Commands;

use Illuminate\Database\Console\Migrations\MigrateMakeCommand as BaseMigrateMakeCommand;

class MigrateMakeCommand extends BaseMigrateMakeCommand
{
    use ParseConfig;

    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'migration {name : The name of the migration.}
        {--create= : The table to be created}
        {--table= : The table to migrate}
        {--path= : The location where the migration file should be created}
        {--realpath : Indicate any provided migration file paths are pre-resolved absolute paths}
        {--fullpath : Output the full path of the migration}';

    /**
     * Get migration path (either specified by '--path' option or default location).
     *
     * @return string
     */
    protected function getMigrationPath()
    {
        if (! is_null($targetPath = $this->input->getOption('path'))) {
            return $this->laravel->basePath().'/'.$targetPath;
        }

        if ($path = $this->getConfig('MIGRATION_PATH')) {
            return getcwd() . DIRECTORY_SEPARATOR . $this->trimPath($path);
        }

        return getcwd() . '/database/migrations';
    }
}
