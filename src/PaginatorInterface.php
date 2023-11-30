<?php

declare(strict_types=1);

namespace DWalczyk\Paginator;

interface PaginatorInterface
{
    public function paginate(mixed $target, int $page = 1, int $itemsPerPage = 30): PaginatorResultInterface;
}
