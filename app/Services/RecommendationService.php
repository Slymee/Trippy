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
    public function recommend(Trip $currentTrip, int $k = 5): Collection
    {
        // Fetch all trips excluding current
        $trips = Trip::where('id', '!=', $currentTrip->id)->get();

        // Prepare training data
        $samples = [];
        $labels = [];

        foreach ($trips as $trip) {
            $samples[] = [
                $trip->number_of_days,
                $this->encodeTransportType($trip->means_of_transport),
                $this->encodeTripType($trip->trip_type),
                // $trip->trip_price, // Added price as a feature
            ];
            $labels[] = $trip->id;
        }

        // Train the KNN model with k neighbors
        $this->model = new KNearestNeighbors($k);
        $this->model->train($samples, $labels);

        // Prepare the current trip features
        $currentTripFeatures = [
            $currentTrip->number_of_days,
            $this->encodeTransportType($currentTrip->means_of_transport),
            $this->encodeTripType($currentTrip->trip_type),
            // $currentTrip->trip_price, // Include price as a feature
        ];

        // Predict k nearest neighbors
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
