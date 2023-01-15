<?php

declare(strict_types=1);

namespace JuseLess\PokeApi\Requests;

use JuseLess\PokeApi\Requests\Concerns\HasRequestPaging;
use JuseLess\PokeApi\Requests\Contracts\PagedRequest as PagedPokeApiRequestContract;

abstract class PagedRequest extends Request implements PagedPokeApiRequestContract
{
    use HasRequestPaging;
}
