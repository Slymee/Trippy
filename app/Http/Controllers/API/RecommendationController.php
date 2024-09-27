<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use App\Services\RecommendationService;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use function App\Helpers\apiResponse;

class RecommendationController extends Controller
{
    public $recommendationService;

    public function __construct(RecommendationService $recommendationService)
    {
        $this->recommendationService = $recommendationService;
    }

    public function index($tripId)
    {
        try{
            $trip = Trip::findOrFail($tripId);

            $recommendedTrips = $this->recommendationService->recommend($trip);

            if($recommendedTrips){
                return apiResponse($recommendedTrips , 'Recommended trips found.', true, 200);
            }

            return apiResponse(null, 'Similar Trips not found.', false, 404);
        }catch(\Exception $e){
            Log::error('Caught Exception: '. $e->getMessage());
            Log::error('Exception Details: '. $e);
            return apiResponse(null, $e->getMessage(), false, 500);
        }
    }
}
