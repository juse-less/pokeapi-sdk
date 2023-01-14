<?php

declare(strict_types=1);

namespace JuseLess\PokeApi\Responses;

use JuseLess\PokeApi\Responses\Contracts\ResponsePaging as ResponsePagingContract;
use JuseLess\PokeApi\Requests\RequestPaging;

class ResponsePaging implements ResponsePagingContract
{
    protected readonly int $totalPages;

    protected readonly int $currentPage;

    protected readonly int|null $previousPage;

    protected readonly int|null $nextPage;

    public function __construct(
        protected readonly int $total,
        protected readonly int|null $offset,
        protected readonly int|null $limit,
    ) {
        $offset ??= RequestPaging::defaultOffset();
        $limit ??= RequestPaging::defaultLimit();

        $totalPages = (int) \ceil($total / $limit);
        $currentPage = (int) floor($offset / $limit);

        $this->totalPages = $totalPages;
        $this->currentPage = $currentPage;
        $this->previousPage = 0 < $currentPage ? ($currentPage - 1) : null;
        $this->nextPage = $totalPages > $currentPage ? ($currentPage + 1) : null;
    }

    public function total(): int
    {
        return $this->total;
    }

    public function hasOffset(): bool
    {
        return ! \is_null($this->offset());
    }

    public function offset(): int|null
    {
        return $this->offset;
    }

    public function hasLimit(): bool
    {
        return ! \is_null($this->limit());
    }

    public function limit(): int|null
    {
        return $this->limit;
    }

    public function totalPages(): int
    {
        return $this->totalPages;
    }

    public function currentPage(): int
    {
        return $this->currentPage;
    }

    public function hasPreviousPage(): bool
    {
        return ! \is_null($this->previousPage());
    }

    public function previousPage(): int|null
    {
        return $this->previousPage;
    }

    public function hasNextPage(): bool
    {
        return ! \is_null($this->nextPage());
    }

    public function nextPage(): int|null
    {
        return $this->nextPage;
    }
}
