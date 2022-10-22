<?php

namespace DWalczyk\Paginator;

class PaginatorResult implements PaginatorResultInterface
{
    public function __construct(
        private array $items,
        private int $itemsCount,
        private int $totalItemsCount,
        private int $pagesCount,
        private int $currentPage,
        private bool $previousPageExist,
        private bool $nextPageExist,
    )
    {}

    public function getItems(): array
    {
        return $this->items;
    }

    public function getItemsCount(): int
    {
        return $this->itemsCount;
    }

    public function getTotalItemsCount(): int
    {
        return $this->totalItemsCount;
    }

    public function getPagesCount(): int
    {
        return $this->pagesCount;
    }

    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    public function isPreviousPageExist(): bool
    {
        return $this->previousPageExist;
    }

    public function isNextPageExist(): bool
    {
        return $this->nextPageExist;
    }
}