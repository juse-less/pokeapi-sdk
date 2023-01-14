<?php

declare(strict_types=1);

namespace JuseLess\PokeApi\Responses\Contracts;

use JuseLess\PokeApi\Requests\Contracts\Request;
use Saloon\Contracts\Response as BaseResponse;

/**
 * @method  Request  getRequest()
 */
interface Response extends BaseResponse
{
    //
}
