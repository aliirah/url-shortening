<?php

namespace App\Facades\Rest;

use Illuminate\Support\Facades\Facade;

/**
 * @method static ok(mixed $array)
 * @method static accepted(mixed $array)
 * @method static badRequest(mixed $array)
 * @method static unauthorized(mixed $array)
 * @method static forbidden(mixed $array)
 * @method static notFound(mixed $array)
 * @method static error(mixed $array)
 * @method static custom(mixed $array , int $statusCode)
 */
class Rest extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'restClass';
    }
}
