<?php

declare(strict_types=1);

namespace TTBooking\Nanoid\Support;

use Closure;
use Hidehalo\Nanoid\Client;
use Hidehalo\Nanoid\CoreInterface;
use Illuminate\Support\Str;

/**
 * @mixin Str
 */
class StrMixin
{
    /**
     * Determine if a given value is a valid NanoID.
     *
     * @return Closure(mixed $value): bool
     */
    public static function isNanoid(): Closure
    {
        return static function (mixed $value): bool {
            if (! is_string($value)) {
                return false;
            }

            $len = strlen($value);

            if ($len < 2 || $len > 36) {
                return false;
            }

            return $len === strspn($value, CoreInterface::SAFE_SYMBOLS);
        };
    }

    /**
     * Generate a NanoID.
     *
     * @return Closure(int $size = 21): string
     */
    public static function nanoid(): Closure
    {
        return static function (int $size = 21): string {
            return (new Client)->generateId($size, Client::MODE_DYNAMIC);
        };
    }
}
