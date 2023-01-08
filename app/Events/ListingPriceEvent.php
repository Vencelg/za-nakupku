<?php

namespace App\Events;

use App\Models\Listing;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ListingPriceEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(protected int $listingId)
    {
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('public.listing.' . $this->listingId . '.price');
    }

    public function broadcastAs(): string
    {
        return 'ListingPriceFor' . $this->listingId;
    }

    public function broadcastWith(): ?array
    {
        $price = Listing::without('listingImages')->where('id', $this->listingId)->first(['price'])
            ?->toArray()['price'];

        return  [
            'price' => $price
        ];
    }
}
