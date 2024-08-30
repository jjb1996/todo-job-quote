<?php

namespace App\Traits;


use Closure;
use Exception;
use Illuminate\Http\Request;
trait ExceptionFlash {


    /**
     * Used for easily catching an exception caused by Closure, and passes message into session for feedback. 
     * @param Closure $function
     * @param Request $request
     * @param string $message
     * @return void
     */
    public function tryWithFlash(Closure $function, Request $request, string $message): void
    {
        try {
            $function();
        }catch (Exception $e){
            report($e); // report to error tracking, for example Flare.
            $request->session()->flash('status', ['type' => 'danger', 'message' => $message]);
        }
    }
}
