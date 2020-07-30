<?php


namespace Iyngaran\Location\Actions;

use Iyngaran\Location\Models\Location;

class CreateLocationAction
{
    public function execute(array $attributes) : Location
    {
        print("The location action...");
    }

}