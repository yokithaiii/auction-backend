<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;
use function env;
use function response;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        if($e instanceof ValidationException) {
            return parent::render($request, $e);
        }
        if($e instanceof MethodNotAllowedHttpException) {
            return response()->json([
                'message' => 'Неправильный метод'
            ], 405);
        }
        if($e instanceof NotFoundHttpException) {
            return response()->json([
                'message' => 'Путь не найден'
            ], 404);
        }
        if($e instanceof ThrottleRequestsException) {
            return response()->json([
                'seconds' => $e->getHeaders()['Retry-After'],
                'message' => 'Превышено допустимое количество попыток. Попробуйте повторить запрос позднее'
            ], 429);
        }
        if($e instanceof AuthorizationException) {
            return response()->json([
                'message' => 'У вас нету доступа'
            ], 403);
        }
        if($e instanceof AuthenticationException) {
            return response()->json([
                'message' => 'Вы не вошли в аккаунт'
            ], 403);
        }
        if ($e instanceof QueryException) {
            if (env('APP_ENV') == 'production') {
                return response()->json([
                    'message' => 'Проблема с базой данных'
                ], 503);
            } else {
                return response()->json([
                    'message' => $e->getMessage()
                ], 503);
            }
        }
        if($e->getCode() == 0) {
            $code = 500;
        } else {
            $code = $e->getCode();
        }
        return response()->json([
            'message' => $e->getMessage(),
            'previous' => $e->getPrevious(),
            'trace' => $e->getTrace()
        ], $code);
    }
}
