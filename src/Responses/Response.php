<?php

declare(strict_types=1);

namespace JuseLess\PokeApi\Responses;

use JuseLess\PokeApi\Contracts\Response as PokeApiResponseContract;
use Saloon\Http\Response as BaseResponse;

abstract class Response extends BaseResponse implements PokeApiResponseContract
{
    //
}
