<?php

namespace App\Repositories\Interfaces;

interface TripRepositoryInterface
{
    public function getAll($userId);
}