<?php


namespace App\Repositories\Eloquent;


use App\Repositories\Contracts\PedidosRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class EloquentPedidosRepository implements PedidosRepositoryInterface
{
    use CommonQueryTrait;

    /**
     * @var Model
     */
    private Model $model;

    /**
     * EloquentPedidosRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
}