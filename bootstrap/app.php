<?php

use App\Http\Middleware\ApiResponseMiddleware;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
        $middleware
            ->alias([

            ])
            ->api(prepend: [
                ApiResponseMiddleware::class,
            ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        /*
         * Format not found responses
         */
        $exceptions->render(static function (NotFoundHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'ok' => false,
                    'message' => $e->getMessage(),
                ], $e->getStatusCode(), [], JSON_UNESCAPED_SLASHES);
            }
        });
        
        /*
         * Format unauthorized responses
         */
        $exceptions->render(static function (AuthenticationException $e, Request $request): \Illuminate\Http\JsonResponse | \Illuminate\Http\RedirectResponse {
            if ($request->is('api/*')) {
                return response()->json([
                    'ok' => false,
                    'message' => __('No autorizado.'),
                ], 401, [], JSON_UNESCAPED_SLASHES);
            }
        });
    })->create();
