<?php

declare(strict_types=1);

namespace JuseLess\PokeApi\Resources\Pokemon\Responses;

use JuseLess\PokeApi\Responses\Response;

class GetPokemonResponse extends Response
{
    protected string|null $response = GetPokemonsResponse::class;
}
