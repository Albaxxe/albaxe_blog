<?php

namespace App\Core;

class Router
{
    private array $routes = [];
    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get(string $path, $action): void
    {
        $this->addRoute('GET', $path, $action);
    }

    public function post(string $path, $action): void
    {
        $this->addRoute('POST', $path, $action);
    }

    private function addRoute(string $method, string $path, $action): void
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $this->normalizePath($path),
            'action' => $action,
        ];
    }

    public function dispatch(): string
    {
        $method = $this->request->method();
        $uri = $this->normalizePath($this->request->uri());

        foreach ($this->routes as $route) {
            $pattern = preg_replace('#\{[a-zA-Z_]+\}#', '([a-zA-Z0-9_-]+)', $route['path']);
            if ($route['method'] === $method && preg_match("#^{$pattern}$#", $uri, $matches)) {
                array_shift($matches);
                return $this->callAction($route['action'], $matches);
            }
        }

        // Page 404 personnalisée
        http_response_code(404);
        ob_start();
        include __DIR__ . '/../views/error_404.php';
        return ob_get_clean();
    }

    // Méthode `callAction` du routeur
    protected function callAction(string $action, array $params): string
    {
    list($controllerName, $methodName) = explode('@', $action);
    $controllerClass = "\\App\\Controllers\\$controllerName";

    if (!class_exists($controllerClass)) {
        throw new \Exception("Le contrôleur {$controllerClass} n'existe pas.");
    }

    $controller = new $controllerClass();

    if (!method_exists($controller, $methodName)) {
        throw new \Exception("La méthode {$methodName} n'existe pas dans le contrôleur {$controllerClass}.");
    }

    return call_user_func_array([$controller, $methodName], $params) ?? '';
    }

    private function normalizePath(string $path): string
    {
        return trim(parse_url($path, PHP_URL_PATH), '/');
    }
}
