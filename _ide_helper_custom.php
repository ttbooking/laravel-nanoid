<?php

namespace Illuminate\Support
{
    use TTBooking\Nanoid\Support\StringableMixin;
    use TTBooking\Nanoid\Support\StrMixin;

    class Str
    {
        /**
         * Determine if a given value is a valid NanoID.
         */
        public static function isNanoid(mixed $value): bool
        {
            return StrMixin::isNanoid()($value);
        }

        /**
         * Generate a NanoID.
         */
        public static function nanoid(int $size = 21): string
        {
            return StrMixin::nanoid()($size);
        }
    }

    class Stringable
    {
        /**
         * Determine if a given string is a valid NanoID.
         */
        public function isNanoid(): bool
        {
            /** @var StringableMixin $instance */
            return $instance->isNanoid()();
        }

        /**
         * Execute the given callback if the string is a valid NanoID.
         */
        public function whenIsNanoid(callable $callback, callable $default = null): static
        {
            /** @var StringableMixin $instance */
            return $instance->whenIsNanoid()($callback, $default);
        }
    }
}
