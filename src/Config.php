<?php

namespace MichaelJennings\LaravelMake;

use Illuminate\Support\Arr;

class Config
{
    /**
     * Get the config value.
     *
     * @param string      $type
     * @param string|null $group
     * @return string|null
     */
    public function get(string $type, string $group = null): ?string
    {
        $config = $this->getConfig();

        if ($group && $value = $this->getValue($config, $group, $type)) {
            return $value;
        }

        return $this->getValue($config, 'base', $type);
    }

    /**
     * Get the value from the config.
     *
     * @param array  $config
     * @param string $group
     * @param string $type
     * @return string|null
     */
    protected function getValue(array $config, string $group, string $type): ?string
    {
        return Arr::get($config, strtoupper($group).'_'.strtoupper($type));
    }

    /**
     * Get the config for laravel-make.
     *
     * @return array
     */
    protected function getConfig(): array
    {
        $configPath = getcwd() . '/.laravel-make';
        $config = [];

        if (file_exists($configPath)) {
            $contents = file_get_contents($configPath);
            $lines = explode("\n", $contents);

            foreach ($lines as $line) {
                $value = explode('=', $line);

                if (isset($value[0]) && isset($value[1])) {
                    if (!str_starts_with($value[0], '#')) {
                        $config[$value[0]] = $value[1];
                    }
                }
            }
        }

        return $config;
    }

    /**
     * Get the path to use.
     *
     * @param string|null $group
     * @return null
     */
    public static function getPath(string $group = null)
    {
        return (new static())->get('path', $group);
    }

    /**
     * Get the namespace to use.
     *
     * @param string|null $group
     * @return null
     */
    public static function getNamespace(string $group = null)
    {
        return (new static())->get('namespace', $group);
    }
}
