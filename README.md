# Paginator bundle

Paginator Bundle for the Symfony Framework.

## Installation
### Composer

``` bash
composer require dwalczyk/paginator-bundle
```

### Add bundle to application

``` php
// config/bundles.php
DWalczyk\Paginator\PaginatorBundle::class => ['all' => true]
```

## Usage

### Base usage
Doctrine QueryBuilder is supported by default.
```php
use DWalczyk\Paginator\PaginatorInterface;

#[Route('/users')]
public function __invoke(PaginatorInterface $paginator)
{
    $res = $paginator->paginate(
        $target = $this->getEm()->createQueryBuilder()->select('u')->from(User::class, 'u'), 
        $page = 1, 
        $itemsPerPage = 30
    );
    
    dump($res);
}
```

### Custom data loader

1. Create class that implements DWalczyk\Paginator\DataLoaderInterface

```php
<?php

namespace App\Service;

use DWalczyk\Paginator\DataLoaderInterface;

class SamplePaginatorDataLoader implements DataLoaderInterface
{
    public function loadItems(mixed $target, int $offset, int $limit): array
    {
        // some logic here
    }

    public function loadTotalCount(mixed $target): int
    {
        // some logic here
    }
}
```

2. Replace default data loader (doctrine QueryBuilder) with your new data loader.
```yaml
# config/services.yaml
services:
  
  ...
  
  DWalczyk\Paginator\DataLoaderInterface: '@App\Service\SamplePaginatorDataLoader'
```

3. done!