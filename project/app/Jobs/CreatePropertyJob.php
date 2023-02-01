<?php

namespace App\Jobs;

use App\Actions\Property\StoreAction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Batchable;

class CreatePropertyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Batchable;

    private $addresses;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($addresses)
    {
        $this->addresses = $addresses;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(StoreAction $action)
    {
        foreach($this->addresses as $address) {
            $action->execute($address);
        }
    }
}
