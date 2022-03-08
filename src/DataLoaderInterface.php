<?php

namespace DWalczyk\Paginator;

interface DataLoaderInterface
{
    public function loadItems(mixed $target, int $offset, int $limit): array;

    public function loadTotalCount(mixed $target): int;
}