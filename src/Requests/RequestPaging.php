<?php

declare(strict_types=1);

namespace JuseLess\PokeApi\Requests;

use JuseLess\PokeApi\Requests\Contracts\RequestPaging as RequestPagingContract;

class RequestPaging implements RequestPagingContract
{
    public function __construct(
        protected readonly int|null $offset = null,
        protected readonly int|null $limit = null,
    ) {}

    public static function defaultOffset(): int
    {
        return 0;
    }

    public static function defaultLimit(): int
    {
        return 20;
    }

    public function offset(): int|null
    {
        return $this->offset;
    }

    public function limit(): int|null
    {
        return $this->limit;
    }

    public function toArray(): array
    {
        return \array_filter([
            'offset' => $this->offset(),
            'limit' => $this->limit(),
        ], fn (mixed $value): bool => !\is_null($value));
    }
}
