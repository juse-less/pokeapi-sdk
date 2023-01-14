<?php

declare(strict_types=1);

namespace JuseLess\PokeApi\Requests\Concerns;

use JuseLess\PokeApi\Requests\Contracts\RequestPaging;

trait HasRequestPaging
{
    /**
     * @return  $this
     */
    public function paging(RequestPaging $paging): static
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
}
