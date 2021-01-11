<?php

namespace App\Repositories\Eloquent;


use App\Repositories\Contracts\ClientRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class EloquentClientRepository implements ClientRepositoryInterface
{
    /**
     * @var Model
     */
    private Model $model;

    /**
     * EloquentClientRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param int $perPage
     * @param int $pageNumber
     * @return mixed
     */
    public function getPaginate(int $perPage, int $pageNumber = 0){
       return $this->model->limit($perPage)->offset($perPage * ($pageNumber - 1))->get();
    }


    /**
     * @param int $perPage
     * @return int|mixed
     */
    public function getNumberOfPages(int $perPage): int
    {
       return intval(ceil($this->model->count() / $perPage));
    }
}