<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Routing\Exceptions\InvalidSignatureException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [

        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
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
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if($e instanceof \Illuminate\Session\TokenMismatchException){
            return redirect()
                ->back()
                ->withInput($request->except('_token'))
                ->withMessage('Your explanation message depending on how much you want to dumb it down, lol!');
        }
        return parent::render($request, $e);
    }

    public function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()){
            return response()->json(['error' => 'Unauthenticated.'],401);
        }

        $guard = array_get($exception->guards(),0);

        switch ($guard){

            case 'admin':
                return redirect()->guest(route('admin.login'));
                break;

            default:
                return redirect()->guest(route('login'));
                break;
        }


    }
}
