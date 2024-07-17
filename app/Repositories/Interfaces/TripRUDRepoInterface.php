<?php

namespace App\Repositories\Interfaces;

interface TripRUDRepoInterface{
    public function trip($tripId);

    public function destination($destinationId);

    public function itenerary($iteneraryId);

    public function accomodation($accomodationId);

    public function transportation($transportationId);
}