<?php

namespace belajar\php\Routes;

class Router
{
    private static array $routes = [];

    public static function add(string $method, string $path, string $controller, string $function): void
    {
        self::$routes[] = [
            'method' => $method,
            'path' =>  $path,
            'controller' => $controller,
            'function' => $function
        ];
    }

    public static function run(): void
    {
        $path = '/';
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

        if (isset($_SERVER["PATH_INFO"])) {
            $path = $_SERVER['PATH_INFO'];
        }

        foreach (self::$routes as $route) {
            $pattern = self::convertToRegex($route['path']);
            if (preg_match($pattern, $path, $matches) && $method == $route['method']) {
                array_shift($matches); 
                $function = $route['function'];
                $controller = new $route['controller'];
                $controller->$function(...$matches);
                return;
            }
        }

        http_response_code(404);
        echo "controller not found";
    }

    private static function convertToRegex($path)
    {
        return '/^' . str_replace('/', '\/', preg_replace('/\{(\w+)\}/', '(\d+)', $path)) . '$/';
    }
}
