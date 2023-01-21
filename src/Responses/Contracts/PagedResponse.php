<?php

declare(strict_types=1);

namespace JuseLess\PokeApi\Responses\Contracts;

use JuseLess\PokeApi\Requests\Contracts\PagedRequest;

/**
 * @method   PagedRequest  getRequest()
 */
interface PagedResponse extends Response
{
    public function paging(): ResponsePaging;
}
