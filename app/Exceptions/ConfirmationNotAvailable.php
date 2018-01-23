<?php

namespace App\Exceptions;

use Exception;

class ConfirmationNotAvailable extends Exception
{
    /**
     * Render the exception as an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response()->view('components.errors.index', [
            'error' => 'parameters are not correct'
        ], 500);
    }
}
