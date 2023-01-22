<?php

declare(strict_types=1);

namespace JuseLess\PokeApi\Requests;

use JuseLess\PokeApi\Contracts\PokeApiConnector;
use JuseLess\PokeApi\Requests\Contracts\PagedRequest;
use JuseLess\PokeApi\Requests\Contracts\RequestPaginator as RequestPaginatorContract;
use JuseLess\PokeApi\Responses\Contracts\PagedResponse;
use Saloon\Contracts\Pool;

// TODO: Add __serialize, __unserialize, as well as JsonSerializable.
//       That way we can pass the RequestPaginator between processes, and what not, and it'd retain the correct state to continue.

class RequestPaginator implements RequestPaginatorContract
{
    protected int $page;

    protected readonly int $originalPage;

    protected PagedResponse|null $lastResponse = null;

    public function __construct(
        protected readonly PokeApiConnector $connector,
        protected readonly PagedRequest $originalRequest,
    ) {
        /** @var  int  $page */
        $page = $this->originalRequest->query()->get('page', default: 1);

        $this->page = $this->originalPage = $page;
    }

    public function pool(
        callable|int $concurrency = 5,
        callable|null $responseHandler = null,
        callable|null $exceptionHandler = null,
    ): Pool {
        return $this->connector->pool(
            $this,
            $concurrency,
            $responseHandler,
            $exceptionHandler,
        );
    }

    public function key(): int
    {
        return $this->page;
    }

    public function current(): PagedResponse
    {
        $request = clone $this->originalRequest;
        $request->page($this->page);

        /** @var  PagedResponse  $response */
        $response = $this->connector->send($request);

        return $this->lastResponse = $response;
    }

    public function valid(): bool
    {
        // If we haven't sent a request yet, and therefore don't have any response, the iterator is still valid.
        // It's only ever invalid when we have sent a request and have no more pages.
        // Otherwise PHP would immediately terminate  the iteration, without sending a request.
        return \is_null($this->lastResponse)
            || $this->lastResponse->paging()->hasNextPage();
    }

    public function next(): void
    {
        $this->page++;
    }

    public function rewind(): void
    {
        $this->page = $this->originalPage;

        // Nullify the last response, so we don't accidentally check if there are more pages, even though we're starting over.
        $this->lastResponse = null;
    }
}
