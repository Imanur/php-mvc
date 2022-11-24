<?php

namespace ProgrammerPhp\PhpMvc\Config;

class Router
{

    private static array $routes = [];

    public static function add(string $method, string $path, string $controller, string $function, array $middleware = []): void
    {
        self::$routes[] = [
            "method" => $method,
            "path" => $path,
            "controller" => $controller,
            "function" => $function,
            "middleware" => $middleware
        ];
    }

    public static function run(): void
    {
        $path = "/";
        if (isset($_SERVER['PATH_INFO'])) {
            $path = $_SERVER['PATH_INFO'];
        }
        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $route) {
            $pattern = '#^' . $route['path'] . '$#';
            if (preg_match($pattern, $path, $variables) && $method == $route['method']) {
                // if ($path == $route['path'] && $method == $route['method']) {
                // echo "CONTROLLER : " . $route['controller'] . ", FUNCTION : " . $route['function'];
                // return;
                // $className = 'Programmerphp\Loginmanagement\Controller\HomeController';
                // $functionName = 'index';
                // $controller = new $className; == new 'Programmerphp\Loginmanagement\Controller\HomeController';
                // $controller->$function(); == $controller->'index';
                // $function = $route['function'];
                // $controller = new $route['controller'];
                // $controller->$function();
                foreach ($route['middleware'] as $middleware) {
                    $instance = new $middleware;
                    $instance->before();
                }

                $function = $route['function'];
                $controller = new $route['controller'];
                array_shift($variables);
                call_user_func_array([$controller, $function], $variables);
                return;
            }
        }

        http_response_code(404);
        echo "CONTROLLER NOT FOUND";
    }
}