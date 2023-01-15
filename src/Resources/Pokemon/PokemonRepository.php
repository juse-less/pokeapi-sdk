<?php

declare(strict_types=1);

namespace JuseLess\PokeApi\Resources\Pokemon;

use JuseLess\PokeApi\Requests\Contracts\RequestPaging;
use JuseLess\PokeApi\Resources\Pokemon\Requests\GetPokemonRequest;
use JuseLess\PokeApi\Resources\Pokemon\Requests\GetPokemonsRequest;
use JuseLess\PokeApi\Responses\Contracts\PagedResponse;
use JuseLess\PokeApi\Responses\Contracts\Response;
use JuseLess\PokeApi\Resources\ResourceRepository;

class PokemonRepository extends ResourceRepository
{
    public function getAll(
        RequestPaging|null $paging = null,
    ): PagedResponse {
        /** @var  PagedResponse */
        return $this->pokeApi->sendAsync(GetPokemonsRequest::make(
            $paging,
        ));
    }

    public function get(\Stringable|string|int $idOrName): Response
    {
        /** @var  Response */
        return $this->pokeApi->sendAsync(GetPokemonRequest::make(
            $idOrName,
        ));
    }
}
