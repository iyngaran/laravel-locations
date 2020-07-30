<?php


namespace Iyngaran\Location\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Iyngaran\Location\Models\Location;

interface LocationRepositoryInterface
{
    public function find(int $id): ? Location;
    public function findByName(string $name): ? Location;
}