<?php

declare(strict_types=1);

namespace JuseLess\PokeApi\Contracts;

use JuseLess\PokeApi\Resources\Pokemon\PokemonRepository;
use Saloon\Contracts\Connector;

interface PokeApiConnector extends Connector
{
    public function pokemons(): PokemonRepository;
}
