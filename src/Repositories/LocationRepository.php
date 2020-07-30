<?php


namespace Iyngaran\Location\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Iyngaran\Location\Exceptions\LocationNotFoundException;
use Iyngaran\Location\Models\Location;

class LocationRepository implements LocationRepositoryInterface
{

    public function find(int $id): ?Location
    {
        $location = Location::find($id);
        if (!$location) {
            throw new LocationNotFoundException("The location id # ".$id." not found");
        }
        return $location;
    }

    public function findByName(string $name): ?Location
    {
        $location = Location::where('name', $name)->first();
        if (!$location) {
            throw new LocationNotFoundException("The location name # ".$name." not found");
        }
        return $location;
    }
}