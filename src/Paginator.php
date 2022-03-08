<?php

namespace DWalczyk\Paginator;

class Paginator implements PaginatorInterface
{
    public function __construct(private DataLoaderInterface $dataLoader)
    {}

    public function paginate(mixed $target, int $page = 1, int $itemsPerPage = 30): PaginatorResultInterface
    {
        $items = $this->dataLoader->loadItems(clone $target, $this->calculateOffset($page, $itemsPerPage), $itemsPerPage);
        $totalItemsCount = $this->dataLoader->loadTotalCount(clone $target);

        $totalPagesCount = $this->calculatePagesCount($totalItemsCount, $itemsPerPage);

        return new PaginatorResult(
            $items,
            count($items),
            $totalItemsCount,
            $totalPagesCount,
            $page != 1,
            $totalPagesCount > $page
        );
    }

    private function calculateOffset(int $page, int $itemsPerPage): int
    {
        if ($page < 0) $page = 0;

        return ($page - 1) * $itemsPerPage;
    }

    private function calculatePagesCount(int $totalItemsCount, int $itemsPerPage): int
    {
        return ceil($totalItemsCount / $itemsPerPage);
    }
}