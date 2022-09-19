<?php

namespace App\Services;

use App\Services\Interfaces\ResponseServiceInterface;
use Illuminate\Http\JsonResponse;

/**
 * Class ResponseService
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
        $count = !is_null($data) ? 1 : 0;

        return response()->json([
            'errors' => $errors,
            'count' => $count,
            'data' => $data
        ],
            $status);
    }
}
