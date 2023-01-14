<?php

declare(strict_types=1);

namespace JuseLess\PokeApi\Requests;

use JuseLess\PokeApi\Contracts\Request as PokeApiRequestContract;
use Saloon\Http\Request as BaseRequest;

abstract class Request extends BaseRequest implements PokeApiRequestContract
{
    //
}
