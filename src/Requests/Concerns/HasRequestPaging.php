<?php

declare(strict_types=1);

namespace JuseLess\PokeApi\Requests\Concerns;

use JuseLess\PokeApi\Requests\Contracts\RequestPaging as RequestPagingContract;
use JuseLess\PokeApi\Requests\RequestPaging;

trait HasRequestPaging
{
    /**
     * @return  $this
     */
    public function paging(RequestPagingContract $paging): static
    {
        $this->query()->merge(
            $paging->toArray(),
        );

        return $this;
    }

    /**
     * @return  $this
     */
    public function offset(int $offset): static
    {
        $this->query()->merge([
            'offset' => $offset,
        ]);

        return $this;
    }

    /**
     * @return  $this
     */
    public function limit(int $limit): static
    {
        $this->query()->merge([
            'limit' => $limit,
        ]);

        return $this;
    }

    /**
     * @return  $this
     */
    public function page(int $page): static
    {
        if ($page <= 0) {
            $page = 1;
        }

        $limit = $this->query()->get('limit', RequestPaging::defaultLimit());
        $offset = ($page - 1) * $limit;

        return $this->offset($offset);
    }
}
