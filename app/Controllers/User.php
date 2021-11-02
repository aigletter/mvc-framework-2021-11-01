<?php


namespace App\Controllers;


use Core\Application;

class User
{
    public function __construct()
    {
        $cache = Application::getInstance()->getCache();
        $cache->put('test-key', 'test-value');
    }

    public function show()
    {
        echo Application::getInstance()->getCache()->get('test-key');
        return 'User controller method show';
    }

    public function create()
    {
        return 'Create method';
    }
}