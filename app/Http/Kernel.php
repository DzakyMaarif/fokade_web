<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // Trust proxies from App Service Provider
        \App\Http\Middleware\TrustProxies::class,

        // Handle CORS using Laravel core
        \Illuminate\Http\Middleware\HandleCors::class,

        // Prevent requests during maintenance
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,

        // Validate POST size
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,

        // Trim incoming strings
        \App\Http\Middleware\TrimStrings::class,

        // Convert empty strings to null
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            // Encrypt cookies
            \App\Http\Middleware\EncryptCookies::class,
            // Add queued cookies to response
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            // Start session
            \Illuminate\Session\Middleware\StartSession::class,
            // Share errors from session
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            // Verify CSRF token
            \App\Http\Middleware\VerifyCsrfToken::class,
            // Substitute route bindings
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            // Throttle API requests
            'throttle:api',
            // Substitute route bindings
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        // Authentication
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,

        // Cache headers
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,

        // Authorization
        'can' => \Illuminate\Auth\Middleware\Authorize::class,

        // Guest redirect
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,

        // Password confirmation
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,

        // Signed URLs
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,

        // Rate limiting
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,

        // Email verification
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

        // Spatie Permission Middleware
        'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
        'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
        'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
    ];
}
