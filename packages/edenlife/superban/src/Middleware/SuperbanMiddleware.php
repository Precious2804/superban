<?php

namespace EdenLife\Superban\Middleware;

use Closure;
use Illuminate\Cache\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SuperbanMiddleware
{
    protected $limiter;

    public function __construct(RateLimiter $limiter)
    {
        $this->limiter = $limiter;
    }

    public function handle(Request $request, Closure $next, $limit, $time, $banTime)
    {
        $key = $this->resolveRequestSignature($request);

        if (Cache::get($key . ':banned')) {
            // Client is banned
            return response('You have been banned.', 403);
        }

        if ($this->limiter->tooManyAttempts($key, $limit, $time)) {
            // Ban the client
            $this->banClient($key, $banTime);

            return response('You have been banned.', 403);
        }

        $this->limiter->hit($key, $time);

        return $next($request);
    }

    protected function resolveRequestSignature(Request $request)
    {
        return sha1(
            $request->method() .
                '|' . $request->server('SERVER_NAME') .
                '|' . $request->path() .
                '|' . $request->ip()
        );
    }

    protected function banClient($key, $banTime)
    {
        // Implement your ban logic here, e.g., store the ban information in cache
        Cache::put($key . ':banned', true, $banTime);
    }
}
