<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Persons\Models\PersonBiograph;

class PersonBiographDeleted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $biograph;

    public $personable;

	/**
	 * Create a new event instance.
	 *
	 * @param PersonBiograph $biograph
	 */
    public function __construct(PersonBiograph $biograph)
    {
        $this->biograph = $biograph;
        $this->personable = $biograph->personable;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
		return new PrivateChannel('personable.' . '.' . $this->biograph->personable_type . '.' . $this->personable->id . '.biograph');
    }
}
