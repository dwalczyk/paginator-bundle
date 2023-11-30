<?php

declare(strict_types=1);

namespace DWalczyk\Paginator\DataLoader;

use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;
use DWalczyk\Paginator\DataLoaderInterface;

final class DoctrineOrmDataLoader implements DataLoaderInterface
{
    /**
     * @param QueryBuilder $target
     *
     * @throws \Exception
     */
    public function loadItems(mixed $target, int $offset, int $limit): array
    {
        $this->validateTarget($target);

        $target
            ->setFirstResult($offset)
            ->setMaxResults($limit)
        ;

        $paginator = new Paginator($target->getQuery(), true);

        $items = [];

        foreach ($paginator as $item) {
            $items[] = $item;
        }

        return $items;
    }

    /**
     * @param QueryBuilder $target
     *
     * @throws \Exception
     */
    public function loadTotalCount(mixed $target): int
    {
        $this->validateTarget($target);

        $result = $target->getQuery()->getResult();

        return \count($result);
    }

    /**
     * @throws \Exception
     */
    private function validateTarget(mixed $target): void
    {
        if ($target instanceof QueryBuilder) {
            return;
        }

        throw new \Exception('Invalid target. Supported class: Doctrine\ORM\QueryBuilder');
    }
}
