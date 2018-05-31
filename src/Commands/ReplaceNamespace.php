<?php

namespace GML\LaravelMake\Commands;

trait ReplaceNamespace
{
    use ParseConfig;

    /**
     * Replace the namespace for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return $this
     */
    protected function replaceNamespace(&$stub, $name)
    {
        $stub = str_replace(
            ['DummyNamespace', 'DummyRootNamespace', 'NamespacedDummyUserModel'],
            [$this->getClassNamespace($name), $this->rootNamespace(), $this->getUserModel()],
            $stub
        );

        return $this;
    }

    /**
     * Get the root namespace for the class.
     *
     * @return string
     */
    protected function rootNamespace()
    {
        if ($namespace = $this->getConfig('BASE_NAMESPACE')) {
            return $namespace;
        }

        return $this->laravel->getNamespace();
    }

    /**
     * Check if the class namespace is specified in the config. If it
     * isn't then return the default namespace.
     *
     * @param  string  $name
     * @return string
     */
    protected function getClassNamespace($name)
    {
        $configKey = strtoupper(str_replace(' ', '_', $this->type)) . '_NAMESPACE';

        if ($namespace = $this->getConfig($configKey)) {
            $name = str_replace('/', '\\', $this->getNameInput());

            $commandNamespace = $this->getNamespace($name);

            if ( ! empty($commandNamespace)) {
                return $namespace . '\\' . $commandNamespace;
            }

            return rtrim($namespace, '\\');
        }

        return $this->getNamespace($name);
    }

    /**
     * Get the user model.
     *
     * @return string
     */
    protected function getUserModel()
    {
        return $this->getConfig('USER_MODEL') ?: 'App\\User';
    }
}