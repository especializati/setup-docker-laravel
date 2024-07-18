<?php

namespace App\Repositories;

interface PaginationInterface
{

    /**
     * @return stdClass[]
     */
    public function items(): array;
    public function total(): int;
    public function isfirstPage(): bool;
    public function islastPage(): bool;
    public function currentPage(): int;
    public function getNumberNextPage(): int;
    public function getNumberPreviousPage(): int;

}