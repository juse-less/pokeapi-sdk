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
     * Create a request pool
     *
     * @param  int|(callable(int $pending): int) $concurrency
     * @param  (callable(Response $response, array-key $key, PromiseInterface $aggregatePromise): void)|null $responseHandler
     * @param  (callable(mixed $reason, array-key $key, PromiseInterface $aggregatePromise): void)|null $exceptionHandler
     *
     * @return  Pool
     */
    public function pool(int|callable $concurrency = 5, callable|null $responseHandler = null, callable|null $exceptionHandler = null): Pool;
}
