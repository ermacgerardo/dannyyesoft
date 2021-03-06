<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use App\Traits\GlobalTrait;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
     */
    protected $dontFlash = [
        'current_password',
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
        
        /*$this->reportable(function (Throwable $e) {
            //
        });*/
        
        //TODO: codigos de exception que no son html, arrojan error se deben reinptretar esos codigos
        //Retornando excepciones como JSON
        $this->renderable(function (Throwable $e) {
            
            $data['msgError']=$e->getFile();
            $exceptions['msgError']=$e->getMessage();
            $code=$e->getCode();
            
            
            //$code=400;
            return GlobalTrait::responseJSON($data, $exceptions, $code);
            
            
        });
    }
}
