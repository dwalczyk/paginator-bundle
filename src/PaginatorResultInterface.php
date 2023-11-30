<?php

declare(strict_types=1);

namespace DWalczyk\Paginator;

interface PaginatorResultInterface
{
    public function getItems(): iterable;

    public function getItemsCount(): int;

    public function getTotalItemsCount(): int;

    public function getPagesCount(): int;

    public function getCurrentPage(): int;

    public function isPreviousPageExist(): bool;

    public function isNextPageExist(): bool;
}
