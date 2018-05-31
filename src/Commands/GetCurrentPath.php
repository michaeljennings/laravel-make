<?php

namespace GML\LaravelMake\Commands;

trait GetCurrentPath
{
    use ReplaceNamespace;

    /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        $name = str_replace_first($this->rootNamespace(), '', $name);

        // If a base path is specified in the config we will put the file
        // in that directory.
        if ($basePath = $this->getConfig('BASE_PATH')) {
            $basePath = DIRECTORY_SEPARATOR . $this->trimPath($basePath);
        } else {
            $basePath = DIRECTORY_SEPARATOR . 'app';
        }

        $configKey = strtoupper(str_replace(' ', '_', $this->type)) . '_PATH';

        if ($path = $this->getConfig($configKey)) {
            return getcwd() . DIRECTORY_SEPARATOR . $this->trimPath($path) . DIRECTORY_SEPARATOR . str_replace('\\', '/', $this->getNameInput()).'.php';
        }

        return getcwd() . DIRECTORY_SEPARATOR . $this->trimPath($basePath) . DIRECTORY_SEPARATOR . str_replace('\\', '/', $name).'.php';
    }

    /**
     * Remove the rootnamespace from the name.
     *
     * @param string $name
     * @return string
     */
    protected function removeRootNamespace($name)
    {
        return str_replace($this->rootNamespace(), '', $name);
    }

    /**
     * Remove the default namespace from the name.
     *
     * @param string $name
     * @return string
     */
    protected function removeDefaultNamespace($name, $defaultNamespace = null)
    {
        if ( ! $defaultNamespace) {
            $defaultNamespace = $this->getNamespace($name);
        }

        return str_replace('\\' . $defaultNamespace, '', $name);
    }

    /**
     * Replace the User model namespace.
     *
     * @param  string  $stub
     * @return string
     */
    protected function replaceUserNamespace($stub)
    {
        return str_replace(
            $this->rootNamespace().'User',
            $this->getUserModel(),
            $stub
        );
    }
}