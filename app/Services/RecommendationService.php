<?php

namespace App\Services;

use Phpml\Classification\KNearestNeighbors;
use App\Models\Trip;
use Illuminate\Support\Collection;

class RecommendationService
{
    protected $model;

    public function __construct()
    {
        $this->model = new KNearestNeighbors();
    }

    /**
     * Recommend trips similar to the given trip.
     *
     * @param Trip $currentTrip
     * @return Collection
     */
    public function recommend(Trip $currentTrip): Collection
    {
        //Fetch all trips excluding current
        $trips = Trip::where('id', '!=', $currentTrip->id)->get();

        //Prepare training data
        $sample = [];
        $lables = [];

        foreach ($trips as $trip) {
            // Extract features from trips (one-hot encode categorical features)
            $samples[] = [
                $trip->start_date->diffInDays($trip->end_date), // Duration
                $this->encodeTransportType($trip->means_of_transport), // Transport mode (encoded)
                $trip->arrival_time,  // Arrival time
                $this->encodeTripType($trip->trip_type), // Trip type (encoded)
            ];
            $labels[] = $trip->id; 
        }

         // Train the KNN model
         $this->model->train($samples, $labels);

         // Prepare the current trip features
         $currentTripFeatures = [
             $currentTrip->start_date->diffInDays($currentTrip->end_date), // Duration
             $this->encodeTransportType($currentTrip->means_of_transport), // Transport mode
             $currentTrip->arrival_time,  // Arrival time
             $this->encodeTripType($currentTrip->trip_type), // Trip type (encoded)
         ];
 
         // Predict similar trips
         $recommendedIds = $this->model->predict([$currentTripFeatures]);
 
         // Fetch recommended trips from the database
         $recommendedTrips = Trip::whereIn('id', $recommendedIds)->get();
 
         return $recommendedTrips;
    }

    /**
     * Encode transport type into numerical values
     *
     * @param [type] $transportType
     * @return void
     */
    private function encodeTransportType($transportType)
    {
        $types = [
            'Car' => 0,
            'Foot'=> 1,
            '4WD' => 2,
            'Bus' => 3,
            'Train' => 4
        ];

        return $types[$transportType] ?? 0; // Default to 0 if the transport type is not recognized
    }

    /**
     * Encode trip type into numerical values
     *
     * @param [type] $tripType
     * @return void
     */
    private function encodeTripType($tripType)
    {
        $types = [
            'Hiking' => 0,
            'Trekking' => 1,
            'Road Trip' => 2,
            'Cultural Tour' => 3,
        ];

        return $types[$tripType] ?? 0; // Default to 0 if the trip type is not recognized
    }
}