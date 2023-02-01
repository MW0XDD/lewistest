<?php

namespace App\Actions\Property;

use App\Jobs\CreatePropertyJob;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;
use Throwable;

class QueueStoreAction
{
    private int $chunkSize;

    /**
     * Create the action.
     *
     * @return void
     */
    public function __construct($chunkSize = 10)
    {
        $this->chunkSize = $chunkSize;
    }

    /**
     * Execute the action.
     *
     * @return mixed
     */
    public function execute($addresses)
    {
        $jobs = [];
        foreach( array_chunk($addresses, $this->chunkSize) as $chunk) {
            $jobs[] = new CreatePropertyJob($chunk);
        }

        return Bus::batch($jobs)->then(function (Batch $batch) {
            // All jobs completed successfully...
        })->catch(function (Batch $batch, Throwable $e) {
            // First batch job failure detected...
        })->finally(function (Batch $batch) {
            // The batch has finished executing...
        })->dispatch();
    }
}
