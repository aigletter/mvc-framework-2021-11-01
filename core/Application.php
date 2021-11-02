<?php

namespace Core;


use Core\Exceptions\RouteException;
use Core\Interfaces\CacheInterface;
use Core\Interfaces\RouteInterface;
use Core\Interfaces\RunnableInterface;

class Application implements RunnableInterface
{
    protected $router;

    protected $cache;

    private static $instance;

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {
        //$this->cache = $cache;
        //$this->router = $router;
    }

    public function configure($components = [])
    {
        foreach ($components as $key => $component) {
            if (property_exists($this, $key)) {
                $this->{$key} = $component;
            }
        }
    }

    public function run()
    {
        try {
            $method = $this->router->route();
            echo $method();
        } catch (RouteException $exception) {
            http_response_code(404);
            echo 'Not found';
        }

    }

    /**
     * @return CacheInterface
     */
    public function getCache(): CacheInterface
    {
        return $this->cache;
    }
}