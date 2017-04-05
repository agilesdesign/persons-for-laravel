<?php

namespace Persons\Models\Traits;

use Persons\Models\PersonName;

trait HasPersonName
{
	public function name()
	{
		return $this->morphOne(PersonName::class, 'personable');
	}
}