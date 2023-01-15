<?php

declare(strict_types=1);

namespace JuseLess\PokeApi\Responses\Contracts;

use GuzzleHttp\Promise\PromiseInterface;
use JuseLess\PokeApi\Requests\Contracts\PagedRequest;

/**
 * @extends  \IteratorAggregate<int, PagedResponse|PromiseInterface>
 *
 * @method   PagedRequest  getRequest()
 */
interface PagedResponse extends Response, \IteratorAggregate
{
    public function paging(): ResponsePaging;
}
