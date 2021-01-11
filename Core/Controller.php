<?php


namespace App\Core;


use App\Repositories\Contracts\RepositoryInterface;

class Controller
{
    public RepositoryInterface $repository;

    public function render($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }

    /**
     * @param Request $request
     * @return array
     */
    public function getData(Request $request): array
    {
        $perPage = 15;

        $query = $request->getQueryString();

        if (!isset($query['page'])) {
            $query['page'] = 1;
        }

        $currentPage = intval($query['page']);

        $items = $this->repository->getPaginate($perPage, $currentPage);

        $pages = $this->repository->getNumberOfPages($perPage);

        return [$query, $currentPage, $items, $pages];
    }
}