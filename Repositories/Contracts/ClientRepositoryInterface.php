<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface ClientRepositoryInterface extends RepositoryInterface
{
    /**
     * @param  int $perPage
     * @param  int $pageNumber
     * @return mixed
     */
    public function getPaginate(int $perPage, int $pageNumber = 0);

    /**
     * @param  int $perPage
     * @return mixed
     */
    public function getNumberOfPages(int $perPage);

    /**
     * @param  int $id
     * @return mixed
     */
    public function getClienteById(int $id);

    /**
     * @param  int $perPage
     * @param  int $pageNumber
     * @return mixed
     */
    public function getPedidosforclientPaginate(Model $cliente, int $perPage, int $pageNumber = 0);

    /**
     * @param  Model $cliente
     * @param  int   $perPage
     * @return int
     */
    public function getNumberOfPagesOfPedidos(Model $cliente, int $perPage): int;

    /**
     * @param  array $data
     * @return Model
     */
    public function createCliente(array $data): Model;

}