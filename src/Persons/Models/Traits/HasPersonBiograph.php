<?php

namespace Persons\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Persons\Models\PersonBiograph;

trait HasPersonBiograph
{
	public function biograph()
	{
		return $this->morphOne(PersonBiograph::class, 'personable');
	}

    public function scopeByGender(Builder $query, $id)
    {
        return $query->whereHas('biograph', function($q) use ($id) {
            $q->where('gender_id', $id);
        });
    }

    public function scopeByMaritalStatus(Builder $query, $id)
    {
        return $query->whereHas('biograph', function($q) use ($id) {
            $q->where('marital_status_id', $id);
        });
    }

    public function scopeByReligion(Builder $query, $id)
    {
        return $query->whereHas('biograph', function($q) use ($id) {
            $q->where('religion_id', $id);
        });
    }

    public function scopeByEthnicity(Builder $query, $id)
    {
        return $query->whereHas('biograph', function($q) use ($id) {
            $q->where('ethnicity_id', $id);
        });
    }
}