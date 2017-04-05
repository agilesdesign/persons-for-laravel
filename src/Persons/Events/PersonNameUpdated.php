<?php

namespace Persons\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Persons\Models\PersonName;

class PersonNameUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $name;

    public $personable;

	/**
	 * Create a new event instance.
	 *
	 * @param PersonName $name
	 */
	public function __construct(PersonName $name)
    {
        $this->name = $name;
        $this->personable = $name->personable;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
		return new PrivateChannel('personable.' . '.' . $this->name->personable_type . '.' . $this->personable->id . '.name');
    }
}
