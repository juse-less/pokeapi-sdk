<?php

declare(strict_types=1);

namespace JuseLess\PokeApi\Responses\Contracts;

interface ResponsePaging
{
    public function total(): int;

    public function hasOffset(): bool;

    public function offset(): int|null;

    public function hasLimit(): bool;

    public function limit(): int|null;

    public function totalPages(): int;

    public function currentPage(): int;

    public function hasPreviousPage(): bool;

    public function previousPage(): int|null;

    public function hasNextPage(): bool;

    public function nextPage(): int|null;
}
