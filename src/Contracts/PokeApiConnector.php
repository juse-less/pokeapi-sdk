<?php

declare(strict_types=1);

namespace JuseLess\PokeApi\Contracts;

use JuseLess\PokeApi\Requests\Contracts\PagedRequest;
use JuseLess\PokeApi\Requests\Contracts\RequestPaginator;
use JuseLess\PokeApi\Resources\Pokemon\PokemonRepository;
use Saloon\Contracts\Connector;

interface PokeApiConnector extends Connector
{
    public function paginate(PagedRequest $request): RequestPaginator;

    public function pokemons(): PokemonRepository;
}
