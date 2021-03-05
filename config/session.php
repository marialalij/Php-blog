<?php

namespace App\config;

class Session
{
    private $session;

    public function __construct($session)
    {
        $this->session = $session;
    }

    public function set(string $name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function get($name)
    {
        if(isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }
    }

    public function show($name)
    {
        if(isset($_SESSION[$name]))
        {
            $key = $this->get($name);
            $this->remove($name);
            return $key;
        }
    }

    public function start()
    {
        session_start();
    }
    

    public function remove($name)
    {
        unset($_SESSION[$name]);
    }

    public function stop()
    {
        session_destroy();
    }
    
    public function destroy()
    {
        session_destroy();
    }

    public function getUserInfo($name)
    {
        if (isset($_SESSION['user'])) {
            if (isset($_SESSION['user'][$name])) {
                return $_SESSION['user'][$name];
            }
        }
    }

}