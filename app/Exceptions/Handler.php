<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    protected $dontReport = [
        // AuthorizationException::class,
        // HttpException::class,
        // ModelNotFoundException::class,
        // ValidationException::class
    ];

    public function register(): void
    {
        $this->reportable(function (\Throwable $e) {
          
        });
    }


    public function render($request, \Throwable $e)
    {
        if ($e instanceof ModelNotFoundException) {
            return response()->json([
                'message' => 'Ga ketemu nih!',
                'status' => 'error'
            ], 400);
        }

        if (
            !($e instanceof ValidationException) &&
            !($e instanceof NotFoundHttpException) &&
            (bool) env('Exception_Status', true)
        ) {
            if (app()->environment('production')) {
                // Simpan informasi kesalahan ke dalam database
                // DB::connection('mysql')
                //     ->table('exception_logs')
                //     ->insert([
                //         'endpoint' => $request->fullUrl(),
                //         'path' => substr($request->path(), 0, 190),
                //         'payload' => json_encode($request->all()),
                //         'error_message' => substr($e->getMessage(), 0, 190),
                //         'exception' => $e->__toString(),
                //         'logged_at' => now()
                //     ]);

                return response()->json([
                    'status' => 'error',
                    'message' => 'Internal Server Error',
                ], 500);
            } 
        }

        return parent::render($request, $e);
    }
}
