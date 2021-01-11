<?php

namespace App\Repositories\Eloquent;


use App\Repositories\Contracts\ClientRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class EloquentClientRepository implements ClientRepositoryInterface
{

    use CommonQueryTrait;

    /**
     * @var Model
     */
    private Model $model;

    /**
     * EloquentClientRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }



    /**
     * @param  int $id
     * @return mixed|void
     */
    public function getClienteById(int $id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param  Model $cliente
     * @param  int   $perPage
     * @param  int   $pageNumber
     * @return mixed
     */
    public function getPedidosforclientPaginate(Model $cliente, int $perPage, int $pageNumber = 0)
    {
        return $cliente->pedidos()->limit($perPage)->offset($perPage * ($pageNumber - 1))->get();
    }

    /**
     * @param  Model $cliente
     * @param  int   $perPage
     * @return int|mixed
     */
    public function getNumberOfPagesOfPedidos(Model $cliente, int $perPage): int
    {
        return intval(ceil($cliente->pedidos()->count() / $perPage));
    }

    /**
     * @param array $data
     * @return Model
     */
    public function createCliente(array $data): Model
    {
        return $this->model->create($data);
    }
}