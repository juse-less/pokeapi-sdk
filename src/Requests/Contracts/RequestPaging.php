<?php

declare(strict_types=1);

namespace JuseLess\PokeApi\Requests\Contracts;

interface RequestPaging
{
    public static function defaultOffset(): int;

    public static function defaultLimit(): int;

    public function offset(): int|null;

    public function limit(): int|null;

    /**
     * @return  array{
     *     offset?: int,
     *     limit?: int,
     * }
     */
    public function toArray(): array;
}
