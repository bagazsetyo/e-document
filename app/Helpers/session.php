<?php

if(!function_exists('session')) {
    function session($array)
    {
        foreach($array as $key => $value) {
            $_SESSION[$key] = $value;
        }
    }
}

if(!function_exists('getSession')) {
    function getSession($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }
}

if(!function_exists('destroySession')) {
    function destroySession($key)
    {
        unset($_SESSION[$key]);
    }
}

if(!function_exists('destroyAllSession')) {
    function destroyAllSession()
    {
        session_destroy();
    }
}

if(!function_exists('updateSession')) {
    function updateSession($key, $value)
    {
        $_SESSION[$key] = $value;
    }
}

if(!function_exists('setFlash')) {
    function setFlash($key, $value)
    {
        session([$key => $value]);
    }
}

if(!function_exists('flash')) {
    function flash($key)
    {
        $value = getSession($key);
        destroySession($key);
        return $value;
    }
}

if(!function_exists('setSession')) {
    function setSession($key, $value)
    {
        $_SESSION[$key] = $value;
    }
}

if(!function_exists('dd')) {
    function dd(){
        echo '<pre style="background-color: #f6f8fa; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">';
        foreach(func_get_args() as $arg) {
            var_dump($arg);
        }
        echo '</pre>';
        die();
    }
}