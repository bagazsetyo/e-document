<?php 

if(!function_exists('requestGet')) {
    function requestGet($key = null)
    {
        $data = (object) $_GET;
        if($key) {
            return isset($data->$key) ? $data->$key : null;
        }
        return $data;
    }
}

if(!function_exists('requestPost')) {
    function requestPost($key = null)
    {
        $data = (object) $_POST;
        if($key) {
            return isset($data->$key) ? $data->$key : null;
        }
        return $data;
    }
}

if(!function_exists('requestFile')) {
    function requestFile($key = null)
    {
        $data = (object) $_FILES;
        if($key) {
            return isset($data->$key) ? $data->$key : null;
        }
        return $data;
    }
}