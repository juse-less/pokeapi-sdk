<?php

declare(strict_types=1);

namespace JuseLess\PokeApi;

use JuseLess\PokeApi\Contracts\PokeApiConnector as PokeApiConnectorContract;
use JuseLess\PokeApi\Resources\Pokemon\PokemonRepository;
use JuseLess\PokeApi\Responses\Contracts\Response;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;

/**
 * @method  static  static  make(\Stringable|string $baseUrl = 'https://pokeapi.co/api/v2')
 */
class PokeApiConnector extends Connector implements PokeApiConnectorContract
{
    use AcceptsJson;

    protected string|null $response = Response::class;

    public function __construct(
        protected readonly \Stringable|string $baseUrl = 'https://pokeapi.co/api/v2',
    ) {}

    public function resolveBaseUrl(): string
    {
        return (string) $this->baseUrl;
    }

    public function pokemons(): PokemonRepository
    {
        return new PokemonRepository($this);
    }
}
