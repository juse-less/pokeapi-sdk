<?php

declare(strict_types=1);

namespace JuseLess\PokeApi\Requests\Contracts;

use JuseLess\PokeApi\Responses\Contracts\PagedResponse;

/**
 * @extends  \Iterator<int, PagedResponse>
 */
interface RequestPaginator extends \Iterator
{
    //
}
