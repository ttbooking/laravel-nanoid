<?php

namespace Illuminate\Database\Schema
{
    use TTBooking\Nanoid\Support\BlueprintMixin;

    class Blueprint
    {
        /**
         * Create a new NanoID column on the table.
         */
        public function nanoid(string $column = 'id', int $length = 21): ColumnDefinition
        {
            /** @var BlueprintMixin $instance */
            return $instance->nanoid()($column, $length);
        }

        /**
         * Create a new NanoID column on the table with a foreign key constraint.
         */
        public function foreignNanoid(string $column, int $length = 21): ForeignIdColumnDefinition
        {
            /** @var BlueprintMixin $instance */
            return $instance->foreignNanoid()($column, $length);
        }

        /**
         * Add the proper columns for a polymorphic table using NanoIDs.
         */
        public function nanoidMorphs(string $name, string $indexName = null): void
        {
            /** @var BlueprintMixin $instance */
            $instance->nanoidMorphs()($name, $indexName);
        }

        /**
         * Add nullable columns for a polymorphic table using NanoIDs.
         */
        public function nullableNanoidMorphs(string $name, string $indexName = null): void
        {
            /** @var BlueprintMixin $instance */
            $instance->nullableNanoidMorphs()($name, $indexName);
        }
    }
}

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
