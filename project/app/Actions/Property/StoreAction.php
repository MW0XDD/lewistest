<?php

namespace App\Actions\Property;

use App\Models\Property;

class StoreAction
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
     * @return Property
     */
    public function execute($data) : Property
    {
        return Property::create($data);
    }
}
