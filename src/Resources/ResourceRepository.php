<?php

declare(strict_types=1);

namespace JuseLess\PokeApi\Resources;

use JuseLess\PokeApi\Contracts\ResourceRepository as ResourceRepositoryContract;
use JuseLess\PokeApi\Contracts\PokeApiConnector;

abstract class ResourceRepository implements ResourceRepositoryContract
{
    public function __construct(
        protected readonly PokeApiConnector $pokeApi,
    ) {}
}
