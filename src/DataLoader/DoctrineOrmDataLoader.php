<?php

namespace DWalczyk\Paginator\DataLoader;

use Doctrine\ORM\QueryBuilder;
use DWalczyk\Paginator\DataLoaderInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;

class DoctrineOrmDataLoader implements DataLoaderInterface
{
    /**
     * @param QueryBuilder $target
     * @param int $offset
     * @param int $limit
     * @return array
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
     * @return int
     * @throws \Exception
     */
    public function loadTotalCount(mixed $target): int
    {
        $this->validateTarget($target);

        $result = $target->getQuery()->getResult();
        return count($result);
    }

    /**
     * @param mixed $target
     * @return void
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