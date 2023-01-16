<?php

namespace App\Events;

use App\Models\Listing;
use App\Models\User;
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
    public function __construct(
        protected int $price,
        protected int $listingId,
        protected User $user
    )
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
        return  [
            'price' => $this->price,
            'user' => $this->user
        ];
    }
}
