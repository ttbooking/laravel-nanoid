<?php

declare(strict_types=1);

namespace TTBooking\Nanoid;

use Hidehalo\Nanoid;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

class NanoidServiceProvider extends ServiceProvider
{
    /**
     * All of the container singletons that should be registered.
     *
     * @var array<string, class-string>
     */
    public array $singletons = [
        Nanoid\GeneratorInterface::class => Nanoid\Generator::class,
        Nanoid\CoreInterface::class => Nanoid\Core::class,
    ];

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blueprint::mixin(new Support\BlueprintMixin);
        Str::mixin(new Support\StrMixin);
        Stringable::mixin(new Support\StringableMixin);
        Validator::extend(
            'nanoid',
            static fn (string $attribute, mixed $value) => Str::isNanoid($value),
            'The :attribute field must be a valid NanoID.'
        );
    }
}
