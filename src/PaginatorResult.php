<?php

declare(strict_types=1);

namespace DWalczyk\Paginator;

final readonly class PaginatorResult implements PaginatorResultInterface
{
    public function __construct(
        public array $items,
        public int $itemsCount,
        public int $totalItemsCount,
        public int $pagesCount,
        public int $currentPage,
        public bool $previousPageExist,
        public bool $nextPageExist,
    ) {}

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
