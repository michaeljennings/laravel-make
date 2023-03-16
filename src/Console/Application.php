<?php

namespace MichaelJennings\LaravelMake\Console;

use Illuminate\Console\Application as Artisan;
use MichaelJennings\LaravelMake\Config;
use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Application extends Artisan
{
    /**
     * The base path of the laravel app.
     *
     * @var string
     */
    protected string $defaultPath;

    /**
     * {@inheritdoc}
     */
    public function run(InputInterface $input = null, OutputInterface $output = null): int
    {
        return $this->runInCurrentDirectory($this->getCommandName($input), function () use ($input, $output) {
            return parent::run($input, $output);
        });
    }

    /**
     * Run the callback in the users current working directory.
     *
     * @param string   $command
     * @param callable $callback
     * @return mixed
     */
    protected function runInCurrentDirectory(string $command, callable $callback): mixed
    {
        $this->setPaths($command);

        $result = $callback();

        $this->resetPaths();

        return $result;
    }

    /**
     * Set the paths to use while running the command.
     *
     * @param string $command
     * @return void
     */
    protected function setPaths(string $command): void
    {
        $this->defaultPath = $this->laravel->basePath();

        $this->laravel->setBasePath($this->getCurrentDirectory());
        $this->laravel->useAppPath($this->getAppPath($command));
    }

    /**
     * Reset the paths to their original state.
     *
     * @return void
     */
    protected function resetPaths(): void
    {
        $this->laravel->setBasePath($this->defaultPath);
        $this->laravel->useAppPath($this->defaultPath.DIRECTORY_SEPARATOR.'app');
    }

    /**
     * Get the app path to use while running the generator.
     *
     * @param string $command
     * @return string
     */
    protected function getAppPath(string $command): string
    {
        $group = str_replace('make:', '', $command);

        $path = Config::getPath($group);

        return rtrim($this->getCurrentDirectory(), '/') . DIRECTORY_SEPARATOR . trim($path, '/');
    }

    /**
     * Get the current working directory.
     *
     * @return string
     */
    protected function getCurrentDirectory(): string
    {
        return getcwd();
    }

    /**
     * {@inheritdoc}
     */
    protected function getCommandName(InputInterface $input): ?string
    {
        $name = parent::getCommandName($input);

        if ($name) {
            return "make:{$name}";
        }

        return $name;
    }

    /**
     * {@inheritdoc}
     */
    public function add(SymfonyCommand $command)
    {
        if (!str_starts_with($command->getName(), 'make')) {
            return $command;
        }

        return parent::add($command);
    }
}
