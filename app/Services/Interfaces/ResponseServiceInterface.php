<?php

namespace App\Services\Interfaces;

use Illuminate\Http\JsonResponse;

/**
 * Interface ResponseServiceInterface
 * @package App\Services\Interfaces
 */
interface ResponseServiceInterface
{
    /**
     * @param mixed $data
     * @param int $status
     * @param bool $errors
     * @return JsonResponse
     */
    public static function response(mixed $data, int $status, bool $errors = false): JsonResponse;
}
