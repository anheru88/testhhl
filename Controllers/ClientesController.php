<?php


namespace App\Controllers;


use App\Core\Application;
use App\Core\Controller;
use App\Core\Request;
use App\Models\Cliente;
use App\Repositories\Eloquent\EloquentClientRepository;

class ClientesController extends Controller
{
    /**
     * ClientesController constructor.
     */
    public function __construct()
    {
        $this->repository = new EloquentClientRepository(new Cliente());
    }

    public function index(Request $request)
    {

        [$query, $currentPage, $clientes, $pages] = $this->getData($request);

        return $this->render('clientes/index', compact("query", "clientes", "pages", "currentPage"));
    }

    public function show($id, Request $request)
    {
        try {
            $perPage = 15;

            $query = $request->getQueryString();

            if (!isset($query['page'])) {
                $query['page'] = 1;
            }

            $currentPage = intval($query['page']);

            $cliente = $this->repository->getClienteById($id);

            $pedidos = $this->repository->getPedidosforclientPaginate($cliente, $perPage, $currentPage);

            $pages = $this->repository->getNumberOfPagesOfPedidos($cliente, $perPage);

            return $this->render('clientes/show', compact("cliente", "pedidos", "pages", "currentPage"));
        } catch (\Throwable $e) {
            Application::$app->response->setStatusCode(404);
            return $this->render('_404');
        }
    }

    public function create()
    {
        return $this->render('clientes/create');
    }

    public function save(Request $request)
    {
        $body = $request->getBody();

        $body['contrasena'] = md5($body['contrasena']);

        $this->repository->createCliente($body);

        Application::$app->response->redirect('/clientes');
    }
}