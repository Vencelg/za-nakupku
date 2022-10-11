<?php

namespace App\Exceptions;

use App\Services\ResponseService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ControllerException extends Exception
{
    /**
     * Render the exception as an HTTP response.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function render(Request $request): JsonResponse
    {
        return ResponseService::response(
            config('app.debug')
                ? 'Error in controller on line ' . $this->getLine() . ', ' . $this->getMessage()
                : $this->getMessage(),
            $this->getCode(),
            true);
    }
}
