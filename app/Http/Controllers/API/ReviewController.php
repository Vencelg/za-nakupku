<?php

namespace App\Http\Controllers\API;

use App\Exceptions\ControllerException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\Review;
use App\Services\ResponseService;
use Illuminate\Http\JsonResponse;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified'])->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $reviews = Review::all();

        return $this->response($reviews, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreReviewRequest  $request
     * @return JsonResponse
     */
    public function store(StoreReviewRequest $request): JsonResponse
    {
        $newReview = new Review([
            'user_id' => $request->input('user_id'),
            'created_by_id' => $request->input('created_by_id'),
            'header' => $request->input('header'),
            'body' => $request->input('body'),
            'rating' => $request->input('rating')
        ]);
        $newReview->save();

        return $this->response($newReview, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return JsonResponse
     * @throws ControllerException
     */
    public function show(int $id): JsonResponse
    {
        $review = Review::find($id);
        if (!($review instanceof Review)) {
            throw new ControllerException('Review with id: ' . $id . ' not found', 400);
        }

        return $this->response($review, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateReviewRequest $request
     * @param int $id
     *
     * @return JsonResponse
     * @throws ControllerException
     */
    public function update(UpdateReviewRequest $request, int $id): JsonResponse
    {
        $review = Review::find($id);
        if (!($review instanceof Review)) {
            throw new ControllerException('Review with id: ' . $id . ' not found', 400);
        }

        $review->update($request->all());
        $review->save();

        return $this->response($review, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return JsonResponse
     * @throws ControllerException
     */
    public function destroy(int $id): JsonResponse
    {
        $review = Review::find($id);
        if (!($review instanceof Review)) {
            throw new ControllerException('Review with id: ' . $id . ' not found', 400);
        }

        $review->delete();
        return $this->response([], 200);
    }
}
