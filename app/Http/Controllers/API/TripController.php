<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use App\Repositories\Interfaces\TripRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\FlareClient\Api;

// use Spatie\FlareClient\Api;

use function App\Helpers\apiResponse;

class TripController extends Controller
{
    protected $tripRepo;

    public function __construct(TripRepositoryInterface $tripRepo)
    {
        $this->tripRepo = $tripRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index($userId)
    {
        try{
            $trips = $this->tripRepo->getAll($userId);
            return apiResponse($trips, 'Trip Retrived Successfully.', true, 201);
        }catch (\Exception $e) {
            Log::error('Caught Exception: '. $e->getMessage());
            Log::error('Exception Details: '. $e);
            return apiResponse(null, $e->getMessage(), false, 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(?Trip $trip)
    {
        try{
            if($trip){
                return apiResponse($trip, 'Trip instance found.', true, 200);
            }

            return apiResponse(null, 'Invalid parameters.', false, 404);
        }catch (\Exception $e){
            Log::error('Caught Exception: '. $e->getMessage());
            Log::error('Exception Details: '. $e);
            return apiResponse(null, $e->getMessage(), false, 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trip $trip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trip $trip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trip $trip)
    {
        //
    }


    public function searchTrips(Request $request)
    {
        $validated = $request->validate([
            'search_term' => ['required','string', 'min:1', 'max:255'], // Adjust rules as needed
        ]);

        $searchTerm = trim($validated['search_term']);

        try{
            $trips = $this->tripRepo->getSearchTrip($searchTerm);

        // Check if any trips are found
        if ($trips->count() > 0) {
            return apiResponse([
                'trips' => $trips->items(),
                'meta' => [
                    'total' => $trips->total(),
                    'per_page' => $trips->perPage(),
                    'current_page' => $trips->currentPage(),
                    'last_page' => $trips->lastPage(),
                ],
            ], 'Trips searched successfully', true, 200);
        }

        // No trips found
        return apiResponse(null, 'No similar results found.', false, 404);
        }catch (\Exception $e){
            Log::error('Caught Exception: '. $e->getMessage());
            Log::error('Exception Details: '. $e);
            return apiResponse(null, $e->getMessage(), false, 500);
        }
    }

    public function upcomingTrips($paginate = null)
    {
        try{
            $upcomingTrips = $this->tripRepo->upcomingTrips($paginate);

            $response = [
                'trips' => $upcomingTrips instanceof \Illuminate\Database\Eloquent\Collection ? $upcomingTrips : $upcomingTrips->items(),
            ];

            if ($upcomingTrips instanceof \Illuminate\Pagination\LengthAwarePaginator) {
                $response['meta'] = [
                    'total' => $upcomingTrips->total(),
                    'per_page' => $upcomingTrips->perPage(),
                    'current_page' => $upcomingTrips->currentPage(),
                    'last_page' => $upcomingTrips->lastPage(),
                ];
            }

            return apiResponse($response, 'Upcoming Trips Found.', true, 200);
        }catch (\Exception $e){
            Log::error('Caught Exception: '. $e->getMessage());
            Log::error('Exception Details: '. $e);
            return apiResponse(null, $e->getMessage(), false, 500);
        }
    }

}
