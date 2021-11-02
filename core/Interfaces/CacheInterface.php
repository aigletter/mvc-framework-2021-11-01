<?php


namespace Core\Interfaces;


interface CacheInterface
{
    public function get($key);

    public function put($key, $value);
}