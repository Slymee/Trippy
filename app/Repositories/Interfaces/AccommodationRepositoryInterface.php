<?php

namespace App\Repositories\Interfaces;

interface AccommodationRepositoryInterface
{
    public function getAll();

    public function create(array $data);

    public function show($id);

    public function update($id);

    public function delete($id);
}
