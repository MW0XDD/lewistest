<?php

namespace App\Actions\Property;

use App\Models\Property;
use Illuminate\Database\Eloquent\Collection;

class IndexAction
{
    /**
     * Create the action.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the action.
     *
     * @return Collection<Property>
     */
    public function execute() : Collection
    {
        return Property::all();
    }
}
