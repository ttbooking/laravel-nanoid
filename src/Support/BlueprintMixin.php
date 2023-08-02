<?php

declare(strict_types=1);

namespace TTBooking\Nanoid\Support;

use Closure;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\ColumnDefinition;
use Illuminate\Database\Schema\ForeignIdColumnDefinition;

/**
 * @mixin Blueprint
 */
class BlueprintMixin
{
    /**
     * Create a new NanoID column on the table.
     *
     * @return Closure(string $column = 'id', int $length = 21): ColumnDefinition
     */
    public function nanoid(): Closure
    {
        return function (string $column = 'id', int $length = 21): ColumnDefinition {
            return $this->char($column, $length);
        };
    }

    /**
     * Create a new NanoID column on the table with a foreign key constraint.
     *
     * @return Closure(string $column = 'id', int $length = 21): ForeignIdColumnDefinition
     */
    public function foreignNanoid(): Closure
    {
        return function (string $column, int $length = 21): ColumnDefinition {
            /** @var Blueprint $this */
            return $this->addColumnDefinition(new ForeignIdColumnDefinition($this, [
                'type' => 'char',
                'name' => $column,
                'length' => $length,
            ]));
        };
    }

    /**
     * Add the proper columns for a polymorphic table using NanoIDs.
     *
     * @return Closure(string $name, string $indexName = null): void
     */
    public function nanoidMorphs(): Closure
    {
        return function (string $name, string $indexName = null): void {
            $this->string("{$name}_type");

            /** @var Blueprint $this */
            $this->nanoid("{$name}_id");

            $this->index(["{$name}_type", "{$name}_id"], $indexName);
        };
    }

    /**
     * Add nullable columns for a polymorphic table using NanoIDs.
     *
     * @return Closure(string $name, string $indexName = null): void
     */
    public function nullableNanoidMorphs(): Closure
    {
        return function (string $name, string $indexName = null): void {
            $this->string("{$name}_type")->nullable();

            /** @var Blueprint $this */
            $this->nanoid("{$name}_id")->nullable();

            $this->index(["{$name}_type", "{$name}_id"], $indexName);
        };
    }
}
