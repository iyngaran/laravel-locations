<?php


namespace Iyngaran\Location\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use Iyngaran\ApiResponse\Http\Traits\ApiResponse;
use Iyngaran\Location\Actions\CreateLocationAction;
use Iyngaran\Location\Actions\DeleteLocationAction;
use Iyngaran\Location\Actions\UpdateLocationAction;
use Iyngaran\Location\Http\Requests\LocationRequest;
use Iyngaran\Location\Http\Resources\Location as LocationResource;
use Iyngaran\Location\Http\Resources\LocationCollection;
use Iyngaran\Location\Repositories\LocationRepositoryInterface;
use Illuminate\Http\JsonResponse;

class LocationController
{
    use ApiResponse;

    /**
     * The Location Repository
     *
     * @var \Iyngaran\Location\Repositories\LocationRepository
     */
    private $_location;

    public function __construct(LocationRepositoryInterface $location)
    {
        $this->_location = $location;
    }

    /**
     * Get all categories
     *
     * @return JsonResponse
     */
    public function index()
    {
        return $this->responseWithItem(new LocationCollection($this->_category->search([])));
    }
}