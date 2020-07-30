<?php


namespace Iyngaran\Location\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = [];
    protected $table = 'locations';

    /**
     * Get the parent location the location.
     */
    public function parent()
    {
        return $this->belongsTo(Location::class, 'parent_id');
    }

    // this relationship will only return one level of child items
    public function categories()
    {
        return $this->hasMany(Location::class, 'parent_id');
    }

    // This is method where we implement recursive relationship
    public function childLocations()
    {
        return $this->hasMany(Location::class, 'parent_id')->with('locations');
    }
}