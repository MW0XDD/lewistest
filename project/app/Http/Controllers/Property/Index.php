<?php

namespace App\Http\Controllers\Property;

use App\Actions\Property\IndexAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyResource;

class Index extends Controller
{
    public function __invoke(IndexAction $action)
    {
        $properties = $action->execute();
        return PropertyResource::collection($properties);
    }
}
