<?php

declare(strict_types=1);

namespace JuseLess\PokeApi\Resources;

use JuseLess\PokeApi\Contracts\PokeApiConnector;
use JuseLess\PokeApi\Requests\Contracts\PagedRequest;
use JuseLess\PokeApi\Requests\Contracts\RequestPaginator as RequestPaginatorContract;
use JuseLess\PokeApi\Requests\RequestPaginator;
use JuseLess\PokeApi\Resources\Contracts\ResourceRepository as ResourceRepositoryContract;

// TODO: Make paginate iterate the resource instead of needing a request.
//       We should already know the 'resource listing' request in a resources repository, and don't need to make it redundant for consumers.
//       Current implementation is the equivalent to using the Connector, and also technically more code for the consumer.

abstract class ResourceRepository implements ResourceRepositoryContract
{
    public function __construct(
        protected readonly PokeApiConnector $pokeApi,
    ) {}

    public function paginate(PagedRequest $request): RequestPaginatorContract
    {
        return new RequestPaginator($this->pokeApi, $request);
    }
}
