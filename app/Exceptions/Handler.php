<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use App\Exceptions\InvalidOrderException;
use Exception;
use Illuminate\Validation\ValidationException;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (Exception $exception, $request) {

            if (str_contains($exception->getMessage(), 'unserialize')) {
                $cookie1 = \Cookie::forget('laravel_session');
                $cookie2 = \Cookie::forget('XSRF-TOKEN');

                return redirect()->to('/')
                             ->withCookie($cookie1)
                             ->withCookie($cookie2);
            }

        if($exception instanceof ValidationException){
            return response([
                'errors' => $exception->errors()
            ], 400);
        }
            return response(['error' => $exception->getMessage()], $exception->getCode() ?: 400);
        });
    }
}
