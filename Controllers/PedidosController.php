<?php


namespace App\Controllers;


use App\Core\Application;
use App\Core\Controller;
use App\Core\Request;
use App\Models\Pedido;
use App\Repositories\Eloquent\EloquentPedidosRepository;

class PedidosController extends Controller
{
    /**
     * PedidosController constructor.
     */
    public function __construct()
    {
        $this->repository = new EloquentPedidosRepository(new Pedido());
    }

    public function index(Request $request)
    {
        [$query, $currentPage, $pedidos, $pages] = $this->getData($request);

        return $this->render('pedidos/index', compact("query", "pedidos", "pages", "currentPage"));
    }

    public function show($id, Request $request)
    {
        try {
            return $this->render('pedidos/show');
        } catch (\Throwable $e) {
            Application::$app->response->setStatusCode(404);
            return $this->render('_404');
        }
    }
}