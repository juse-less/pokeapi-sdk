<?php

declare(strict_types=1);

namespace JuseLess\PokeApi\Resources\Pokemon\Requests;

use JuseLess\PokeApi\Requests\Contracts\RequestPaging;
use JuseLess\PokeApi\Requests\PagedRequest;
use JuseLess\PokeApi\Resources\Pokemon\Responses\GetPokemonsResponse;
use Saloon\Enums\Method;

/**
 * @method  static  static  make(RequestPaging|null $paging = null)
 */
class GetPokemonsRequest extends PagedRequest
{
    protected Method $method = Method::GET;

    protected string|null $response = GetPokemonsResponse::class;

    public function __construct(
        public readonly RequestPaging|null $paging = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/pokemon';
    }

    /**
     * @return  array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return $this->paging?->toArray() ?? [];
    }
}
