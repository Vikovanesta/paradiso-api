<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewUpdateRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
    * Update review's reply.
    * 
    * @group Review
    *
    * @authenticated
    **/
    public function update(ReviewUpdateRequest $request, Review $review)
    {
        $validated = $request->validated();

        $review->update($validated);

        $review->load(['user', 'product']);

        return $this->success(new ReviewResource($review), 'Review updated successfully.', 201);
    }
}
