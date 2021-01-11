<?php


namespace App\Controllers;


use App\Core\Controller;
use App\Core\Request;
use App\Models\Cliente;
use App\Repositories\Eloquent\EloquentClientRepository;

class ClientesController extends Controller
{
    /**
     * @var EloquentClientRepository
     */
    private EloquentClientRepository $repository;

    /**
     * ClientesController constructor.
     */
    public function __construct()
    {
        $this->repository = new EloquentClientRepository(new Cliente());
    }

    public function index(Request $request)
    {
        $perPage = 15;

        $query = $request->getQueryString();

        if (!isset($query['page'])) {
            $query['page'] = 1;
        }

        $currentPage = intval($query['page']);

        $clientes = $this->repository->getPaginate($perPage, $currentPage);

        $pages = $this->repository->getNumberOfPages($perPage);

        return $this->render('clientes/index', compact("query", "clientes", "pages", "currentPage"));
    }

    public function show($id, Request $request)
    {
        return $this->render('clientes/show');
    }
}