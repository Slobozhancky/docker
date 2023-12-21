<?php

namespace core;

class Config
{
    static array $configs = [];

    static protected Config|null $instance = null;

    static public function get(string $param): string|null
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }

        return static::$instance->getParam($param);
    }

    public function getParam(string $param): string|null
    {
        $keys = explode('.', $param);
        return $this->findParamsByKeys($keys, $this->retrieveConfigs());
    }

    protected function retrieveConfigs(): array
    {
        if (empty($this->configs)) {
            $this->configs = include CONFIG_DIR . '/db_config.php';
        }

        return $this->configs;
    }

    protected function findParamByKeys(array $keys = [], array $configs = []): string|null
    {
        $value = null;

        if (empty($keys)) {
            return $value;
        }

        $needle = array_shift($keys);

        if (array_key_exists($needle, $configs)) {
            $value = is_array($configs[$needle])
                ? $this->findParamByKeys($keys, $configs[$needle])
                : $configs[$needle];
        }

        return $value;
    }
}