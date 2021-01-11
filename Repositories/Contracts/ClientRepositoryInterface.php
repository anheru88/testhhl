<?php

namespace App\Repositories\Contracts;

interface ClientRepositoryInterface
{
    /**
     * @param int $perPage
     * @param int $pageNumber
     * @return mixed
     */
    public function getPaginate(int $perPage, int $pageNumber = 0);

    /**
     * @param int $perPage
     * @return mixed
     */
    public function getNumberOfPages(int $perPage);
}