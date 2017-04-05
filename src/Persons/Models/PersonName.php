<?php

namespace Persons\Models;

use App\Events\PersonNameRestored;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Persons\Events\PersonNameCreated;
use Persons\Events\PersonNameCreating;
use Persons\Events\PersonNameDeleted;
use Persons\Events\PersonNameDeleting;
use Persons\Events\PersonNameRestoring;
use Persons\Events\PersonNameSaved;
use Persons\Events\PersonNameSaving;
use Persons\Events\PersonNameUpdated;
use Persons\Events\PersonNameUpdating;

class PersonName extends Model
{
    use SoftDeletes;

    /**
     * The name of the "deleted at" column.
     *
     * @var string
     */
    const DELETED_AT = 'deleted_at';

    protected $dates = [Model::CREATED_AT, Model::UPDATED_AT, self::DELETED_AT];

	protected $fillable = ['first', 'last', 'middle', 'suffix', 'preferred', 'nickname'];

    protected $touches = ['personable'];

    protected $events = [
    	'creating' => PersonNameCreating::class,
		'created' => PersonNameCreated::class,
		'deleting' => PersonNameDeleting::class,
		'deleted' => PersonNameDeleted::class,
		'restoring' => PersonNameRestoring::class,
		'restored' => PersonNameRestored::class,
		'saving' => PersonNameSaving::class,
		'saved' => PersonNameSaved::class,
		'updating' => PersonNameUpdating::class,
		'updated' => PersonNameUpdated::class,
	];

    public function personable()
    {
        return $this->morphTo();
    }

	public function getFullAttribute()
	{
		$name = $this->first . ' ';
		$name .= ! empty($this->middle) ? $this->middle . ' ' : '';
		$name .= $this->last;

		return $name;
	}

	public function getFirstLastAttribute()
	{
		return $this->first . ' ' . $this->last;
	}

	public function getPreferredLastAttribute()
	{
		return $this->preferred . ' ' . $this->last;
	}

	public function getLastFirstAttribute()
	{
		return $this->last . ', ' . $this->first;
	}

	public function getFirstInitialAttribute()
    {
        return Str::substr($this->first,0,1);
    }

    public function getMiddleInitialAttribute()
    {
        return Str::substr($this->middle,0,1);
    }

    public function getLastInitialAttribute()
    {
        return Str::substr($this->last,0,1);
    }

    public function getInitialsAttribute()
    {
        $initials = $this->firstInitial . ' ';
        $initials .= ! empty($this->middleInitial) ? $this->middleInitial . ' ' : '';
        $initials .= $this->lastInitial;

        return $initials;
    }

    public function getLastFirstInitialsAttribute()
    {
        return $this->lastInitial . $this->firstInitial;
    }

    public function getFirstLastInitialsAttribute()
    {
        return $this->lastInitial . $this->firstInitial;
    }
}