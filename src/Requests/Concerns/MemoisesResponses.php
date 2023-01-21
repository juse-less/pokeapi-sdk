<?php

declare(strict_types=1);

namespace JuseLess\PokeApi\Requests\Concerns;

use JuseLess\PokeApi\Responses\Contracts\PagedResponse;

// TODO: Should we move to using WeakReferences instead, so we store the Request/Response pair under the page, but in WeakReferences?
//       That way we can keep a lower foot print by them being silently garbage collected, when the consumer/user don't use them anymore, themselves.

trait MemoisesResponses
{
    /**
     * @var  array<int, PagedResponse>
     */
    protected array $responses = [];

    public function current(): PagedResponse
    {
        return $this->responses[ $this->key() ]
            ??= parent::current();
    }

    public function rewind(): void
    {
        parent::rewind();

        // TODO: Should we instead keep them and return the same responses..?
        //       Or are we fine to reset them and 're-memoise'?
        $this->responses = [];
    }
}
