<?php


namespace App\Core;


class Router
{
    protected array $routes = [];
    /**
     * @var Request
     */
    private Request $request;

    /**
     * @var Response
     */
    public Response $response;

    /**
     * Router constructor.
     *
     * @param Request  $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $vars = [];
        $method = $this->request->method();
        $path = $this->request->getPath();

        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            foreach ($this->routes[$method] as $key => $value) {
                if (preg_match_all('/{.+}/', $key, $match)) {
                    $array_key = explode("/", $key);
                    $array_path = explode("/", $path);
                    if (count($array_key) === count($array_path)) {
                        for ($i = 0; $i < count($array_key); $i++) {
                            if($array_key[$i] !== $array_path[$i]) {
                                if (preg_match_all('/{.+}/', $array_key[$i], $match)) {
                                    array_push($vars, $array_path[$i]);
                                }

                                break;
                            }
                        }
                    }
                }
            }

            if (!empty($vars)) {
                array_push($vars, $this->request);
                $value[0] = new $value[0]();
                return call_user_func_array($value, $vars);
            }

            $this->response->setStatusCode(404);
            return $this->renderView('_404');
        }
        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if (is_array($callback)) {
            $callback[0] = new $callback[0]();
        }
        return call_user_func($callback, $this->request);
    }


    public function renderView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR . "/Views/layouts/main.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params = [])
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR . "/Views/$view.php";
        return ob_get_clean();
    }
}