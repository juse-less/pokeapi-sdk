<?php

declare(strict_types=1);

namespace JuseLess\PokeApi\Responses;

use GuzzleHttp\Promise\PromiseInterface;
use JuseLess\PokeApi\Requests\Contracts\PagedRequest;
use JuseLess\PokeApi\Requests\RequestPaging;
use JuseLess\PokeApi\Responses\Contracts\PagedResponse as PagedPokeApiResponseContract;
use JuseLess\PokeApi\Responses\Contracts\ResponsePaging as ResponsePagingContract;
use Psr\Http\Message\ResponseInterface;
use Saloon\Contracts\PendingRequest;
use Throwable;

abstract class PagedResponse extends Response implements PagedPokeApiResponseContract
{
    protected readonly ResponsePagingContract $paging;

    /**
     * @throws  \JsonException
     */
    public function __construct(
        ResponseInterface $psrResponse,
        PendingRequest $pendingRequest,
        Throwable $senderException = null,
    ) {
        parent::__construct($psrResponse, $pendingRequest, $senderException);

        $this->paging = new ResponsePaging(
            total: $this->json('count'),
            offset: $this->json('offset'),
            limit: $this->json('limit'),
        );
    }

    /**
     * @return  \Generator<int, PagedPokeApiResponseContract|PromiseInterface>
     */
    public function getIterator(): \Generator
    {
        do {
            $response = $this;

            $offset = $response->paging()->offset() ?? RequestPaging::defaultOffset();
            $limit = $response->paging()->limit() ?? RequestPaging::defaultLimit();

            /** @var  PagedRequest  $request */
            $request = clone $this->getRequest();

            $request->query()->merge([
                'offset' => $offset + $limit,
                'limit' => $limit,
            ]);

            /** @var  PagedPokeApiResponseContract  $response */
            yield $response = $this->pendingRequest->getConnector()->send($request);
        } while ($response->paging()->hasNextPage());
    }

    public function paging(): ResponsePagingContract
    {
        return $this->paging;
    }
}
