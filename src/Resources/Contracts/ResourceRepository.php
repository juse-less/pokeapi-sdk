<?php

declare(strict_types=1);

namespace JuseLess\PokeApi\Resources\Contracts;

use JuseLess\PokeApi\Requests\Contracts\PagedRequest;
use JuseLess\PokeApi\Requests\Contracts\RequestPaginator;

interface ResourceRepository
{
    public function paginate(PagedRequest $request): RequestPaginator;
}
