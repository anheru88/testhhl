<?php


namespace App\Repositories\Eloquent;


trait CommonQueryTrait
{
    /**
     * @param  int $perPage
     * @param  int $pageNumber
     * @return mixed
     */
    public function getPaginate(int $perPage, int $pageNumber = 0)
    {
        return $this->model->limit($perPage)->offset($perPage * ($pageNumber - 1))->get();
    }


    /**
     * @param  int $perPage
     * @return int|mixed
     */
    public function getNumberOfPages(int $perPage): int
    {
        return intval(ceil($this->model->count() / $perPage));
    }
}