<?php

namespace App\Http\Middleware;

use App\Exceptions\APIException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function unauthenticated($request, array $guards)
    {
        throw new APIException(401, 'Login failed');
    }
}
