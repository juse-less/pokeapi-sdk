<?php

declare(strict_types=1);

namespace JuseLess\PokeApi\Requests\Contracts;

interface PagedRequest extends Request
{
    /**
     * @return  $this
     */
    public function paging(RequestPaging $paging): static;

    /**
     * @return  $this
     */
    public function offset(int $offset): static;

    /**
     * @return  $this
     */
    public function limit(int $limit): static;

    /**
     * @return  $this
     */
    public function page(int $page): static;
}
