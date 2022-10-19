<?php

namespace App\Services;

use App\Services\Interfaces\ResponseServiceInterface;
use Illuminate\Http\JsonResponse;

/**
 * Class ResponseService
 * @author Václav Gazda <gazdavaclav@gmail.com>
 * @package App\Services
 */
class ResponseService implements ResponseServiceInterface
{
    /**
     * @inheritDoc
     */
    public static function response(mixed $data, int $status, bool $errors = false): JsonResponse
    {
        $count = is_countable($data) ? count($data) : null;
        $count = !is_null($count) ? $count : 0;

        return response()->json([
            'errors' => $errors,
            'count' => $count,
            'data' => $data
        ], $status);
    }
}
