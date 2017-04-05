<?php

namespace Persons\Models;

use Myrtle\Ethnicities\Models\Traits\BelongsToEthnicity;
use Myrtle\Genders\Models\Traits\BelongsToGender;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Myrtle\Religions\Models\Traits\BelongsToReligion;

class PersonBiograph extends Model
{
	use BelongsToEthnicity, BelongsToGender, BelongsToReligion, SoftDeletes;

    /**
     * The name of the "deleted at" column.
     *
     * @var string
     */
    const DELETED_AT = 'deleted_at';

    const BIRTH_DATE = 'birth_date';

    const DEATH_DATE = 'death_date';

    protected $dates = [self::BIRTH_DATE, self::DEATH_DATE, Model::CREATED_AT, Model::UPDATED_AT, self::DELETED_AT];

	protected $fillable = ['birth_date', 'gender_id', 'ethnicity_id', 'marital_status_id', 'religion_id', 'death_date'];

    protected $touches = ['personable'];

    public function personable()
    {
        return $this->morphTo();
    }
}
