<?php

namespace Kuliah\ManagementDocument\App;

class Router
{
    private static $routes = [];

    public static function add(string $method, string $path, string $controller, string $function, array $middlewares = []): void
    {
        self::$routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'function' => $function,
            'middleware' => $middlewares
        ];
    }

    public static function run(): void
    {
        $path = '/';
        if (isset($_SERVER['QUERY_STRING'])) {
            $exploded = explode('=', $_SERVER['QUERY_STRING']);

            if (count($exploded) > 1) {
                $path .= $exploded[1];
            } else {
                $path .= $_SERVER['QUERY_STRING'];
            }
        }
        $_SERVER['PATH_INFO'] = $path;

        if (isset($_SERVER['REQUEST_URI'])) {

            $request = $_SERVER['REQUEST_URI'];
            $request = explode('?', $request);
            if (count($request) > 1) {
                array_shift($request);
                // make a array 
                $tempRequest = [];


                $urlDecode = urldecode($request[0]);
                $urlDecode = explode('&', $urlDecode);
                foreach ($urlDecode as $key => $value) {
                    $temp = explode('=', $value);
                    $tempRequest[$temp[0]] = $temp[1];
                }

                $_SERVER['REQUEST_URI'] = $tempRequest;
                $_GET = $tempRequest;
            }else{
                $_SERVER['REQUEST_URI'] = [];
                $_GET = [];
            }
        }

        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $route) {
            $route['path'] = preg_replace('#{([a-z]+)}#', '([0-9a-zA-Z]*)', $route['path']);
            $pattern = "#^" . $route['path'] . "$#";

            if (preg_match($pattern, $path, $variables) && $route['method'] == $method) {

                // middleware 
                foreach ($route['middleware'] as $middleware) {
                    $middleware = new $middleware();
                    $middleware->before();
                }

                $controller = new $route['controller'];
                $function = $route['function'];

                array_shift($variables);
                call_user_func_array([$controller, $function], $variables);

                return;
            }
        }

        http_response_code(404);
        echo 'Halaman tidak ditemukan';
    }
}
