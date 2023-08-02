<?php

declare(strict_types=1);

namespace TTBooking\Nanoid\Support;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

/**
 * @mixin Stringable
 */
class StringableMixin
{
    /**
     * Determine if a given string is a valid NanoID.
     *
     * @return Closure(): bool
     */
    public function isNanoid(): Closure
    {
        return function (): bool {
            return Str::isNanoid($this->value);
        };
    }

    /**
     * Execute the given callback if the string is a valid NanoID.
     *
     * @return Closure(callable $callback, callable $default = null): static
     */
    public function whenIsNanoid(): Closure
    {
        return function (callable $callback, callable $default = null): static {
            return $this->when($this->isNanoid(), $callback, $default);
        };
    }
}
