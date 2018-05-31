<?php

namespace GML\LaravelMake\Commands;

trait ParseConfig
{
    /**
     * The parsed config.
     *
     * @var array|null
     */
    protected $laravelMakeConfig;

    /**
     * Get a config value by its key.
     *
     * @param string $key
     * @return string
     */
    public function getConfig($key)
    {
        if ($this->laravelMakeConfig == null) {
            $this->setUpConfig();
        }

        if (array_key_exists($key, $this->laravelMakeConfig)) {
            return $this->laravelMakeConfig[$key];
        }
    }

    /**
     * Parse the config file to key pair values.
     */
    protected function setUpConfig()
    {
        $configPath = getcwd() . '/.laravel-make';
        $this->laravelMakeConfig = [];

        if (file_exists($configPath)) {
            $contents = file_get_contents($configPath);
            $lines = explode("\n", $contents);

            foreach ($lines as $line) {
                $value = explode('=', $line);

                if (isset($value[0]) && isset($value[1])) {
                    if ( ! starts_with($value[0], '#')) {
                        $this->laravelMakeConfig[$value[0]] = $value[1];
                    }
                }
            }
        }
    }

    /**
     * Remove unwanted characters from the path.
     *
     * @param string $path
     * @return string
     */
    protected function trimPath($path)
    {
        return trim($path, " \t\n\r\0\x0B/\\");
    }
}