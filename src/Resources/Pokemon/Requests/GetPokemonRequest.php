<?php

declare(strict_types=1);

namespace JuseLess\PokeApi\Resources\Pokemon\Requests;

use JuseLess\PokeApi\Requests\Request;
use JuseLess\PokeApi\Resources\Pokemon\Responses\GetPokemonResponse;
use Saloon\Enums\Method;

/**
 * @method  static  static  make(\Stringable|string|int $idOrName)
 */
class GetPokemonRequest extends Request
{
    protected Method $method = Method::GET;

    protected string|null $response = GetPokemonResponse::class;

    public function __construct(
        public readonly \Stringable|string|int $idOrName,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/pokemon/{$this->idOrName}";
    }
}
