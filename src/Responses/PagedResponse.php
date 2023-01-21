<?php

declare(strict_types=1);

namespace JuseLess\PokeApi\Responses;

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

    public function paging(): ResponsePagingContract
    {
        return $this->paging;
    }
}
