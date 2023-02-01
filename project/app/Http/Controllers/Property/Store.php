<?php

namespace App\Http\Controllers\Property;

use App\Actions\Property\QueueStoreAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Property\StoreRequest;
use App\Http\Resources\BatchResource;

class Store extends Controller
{
    public function __invoke(StoreRequest $request, QueueStoreAction $action)
    {
        $batch = $action->execute($request->validated()['address']);
        return (new BatchResource($batch))
            ->response()
            ->setStatusCode(202);
    }
}
