<?php

declare(strict_types=1);

namespace JuseLess\PokeApi\Requests\Contracts;

use GuzzleHttp\Promise\PromiseInterface;
use JuseLess\PokeApi\Responses\Contracts\PagedResponse;
use Saloon\Contracts\Pool;
use Saloon\Contracts\Response;

/**
 * @extends  \Iterator<int, PagedResponse>
 */
interface RequestPaginator extends \Iterator
{
    /**
     * @param  (callable(int $pendingRequests): int)|int $concurrency
     * @param  (callable(Response $response, array-key $key, PromiseInterface $poolAggregate): void)|null $responseHandler
     * @param  (callable(mixed $reason, array-key $key, PromiseInterface $poolAggregate): void)|null $exceptionHandler
     */
    public function pool(callable|int $concurrency = 5, callable|null $responseHandler = null, callable|null $exceptionHandler = null): Pool;
}
