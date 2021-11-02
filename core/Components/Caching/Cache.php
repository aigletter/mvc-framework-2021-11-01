<?php


namespace Core\Components\Caching;


use Core\Interfaces\CacheInterface;

class Cache implements CacheInterface
{
    protected $data = [];

    public function get($key)
    {
        return $this->data[$key] ?? null;
    }

    public function put($key, $value)
    {
        $this->data[$key] = $value;
    }
}