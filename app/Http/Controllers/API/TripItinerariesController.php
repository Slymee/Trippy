<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TripItinerariesRequest;
use App\Repositories\Interfaces\Accommodation\AccommodationCreateUpdateRepositoryInterface;
use App\Repositories\Interfaces\Destination\DestinationCreateUpdateRepositoryInterface;
use App\Repositories\Interfaces\Itenerary\ItineraryCreateUpdateRepositoryInterface;
use App\Repositories\Interfaces\Transportation\TransportationCreateUpdateRepositoryInterface;
use App\Repositories\Interfaces\Trip\TripCreateUpdateRepositoryInterface;
use Illuminate\Http\Request;

class TripItinerariesController extends Controller
{
    protected $tripCreateUpdateRepo;
    protected $destinationCreateUpdateRepo;
    protected $itineraryCreateUpdateRepo;
    protected $accommodationCreateUpdateRepo;
    protected $transportationCreateUpdateRepo;

    public function __construct(
        TripCreateUpdateRepositoryInterface $tripCreateUpdateRepo,
        DestinationCreateUpdateRepositoryInterface $destinationCreateUpdateRepo,
        ItineraryCreateUpdateRepositoryInterface $itineraryCreateUpdateRepo,
        AccommodationCreateUpdateRepositoryInterface $accommodationCreateUpdateRepo,
        TransportationCreateUpdateRepositoryInterface $transportCreateUpdateRepo
    )
    {
        $this->tripCreateUpdateRepo = $tripCreateUpdateRepo;
        $this->destinationCreateUpdateRepo = $destinationCreateUpdateRepo;
        $this->itineraryCreateUpdateRepo = $itineraryCreateUpdateRepo;
        $this->accommodationCreateUpdateRepo = $accommodationCreateUpdateRepo;
        $this->transportationCreateUpdateRepo = $transportCreateUpdateRepo;
    }
    public function store(TripItinerariesRequest $request)
    {
        $jsonData = $request->json();

        $tripArray = [
            'user_id' => auth()->id(),
            'name' => $jsonData['trip']['name'],
            'description' => $jsonData['trip']['description'],
            'start_date' => $jsonData['trip']['start_date'],
            'end_date' => $jsonData['trip']['end_date'],
            'registration_deadline' => $jsonData['trip']['registration_deadline'],
            'max_individuals' => $jsonData['trip']['max_individuals'],
        ];
        $trip = $this->tripCreateUpdateRepo->createTrip($tripArray);

        foreach ($jsonData['trip']['destinations'] as $destinationData){
            $destinationArray = [
                'trip_id' => $trip->id,
                'name' => $destinationData->name,
                'longitude' => $destinationData->longitude,
                'latitude' => $destinationData->latitude,
            ];
            $destination = $this->destinationCreateUpdateRepo->createDestination($destinationArray);

            foreach ($destinationData['itineraries'] as $itineraryData){
                $itineraryArray = [
                    'destination_id' => $destination->id,
                    'name' => $itineraryData->name,
                    'arrival_date' => $itineraryData->arrival_date,
                    'departure_date' => $itineraryData->departure_date,
                ];
                $itinerary = $this->itineraryCreateUpdateRepo->createItinerary($itineraryArray);

                if (isset($itineraryData['accommodation']) && count($itineraryData['accommodation']) > 0) {
                    foreach ($itineraryData['accommodation'] as $accommodationData) {
                        $accommodationArray = [
                            'itinerary_id' => $itinerary->id,
                            'accommodation_name' => $accommodationData->accommodation_name,
                            'accommodation_type' => $accommodationData->accommodation_type,
                            'accommodation_contact' => $accommodationData->accommodation_contact,
                            'accommodation_price' => $accommodationData->accommodation_price,
                        ];
                        $this->accommodationCreateUpdateRepo->createAccommodation($accommodationArray);
                    }
                }

                if (isset($itineraryData['transportation']) && count($itineraryData['transportation']) > 0) {
                    foreach ($itineraryData['transportation'] as $transportationData) {
                        $accommodationArray = [
                            'itinerary_id' => $itinerary->id,
                            'transportation_name' => $transportationData->transportation_name,
                            'transportation_type' => $transportationData->transportation_type,
                            'transportation_vehicle_number' => $transportationData->transportation_vehicle_number,
                            'price_per_person' => $transportationData->transportation_price,
                        ];
                        $this->transportationCreateUpdateRepo->createTransportation($accommodationArray);
                    }
                }
            }
        }
    }
}
