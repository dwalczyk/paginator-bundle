<?php

namespace DWalczyk\Paginator;

interface PaginatorInterface
{
    public function paginate(mixed $target, int $page = 1, int $itemsPerPage = 30): PaginatorResultInterface;
}