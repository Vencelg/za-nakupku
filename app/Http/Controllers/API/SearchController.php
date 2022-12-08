<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Listing;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * SearchController.
 *
 * @author Václav Gazda <gazdavaclav@gmail.com>
 */
class SearchController extends Controller
{
    /**
     * @param string $search
     *
     * @return JsonResponse
     */
    public function index(string $search): JsonResponse
    {
        $categories = Category::where('name', 'ILIKE', '%'.$search.'%')->get();
        $listings = Listing::where('name', 'ILIKE', '%'.$search.'%')->get();

        return $this->response([
            'categories' => $categories,
            'listings' => $listings
        ], 200);
    }
}
