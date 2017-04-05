<?php

namespace Persons\Http\Requests;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Http\FormRequest;
use Flasher\Support\Notifier;
use Illuminate\Support\Facades\Route;

abstract class PersonNameUpdateForm extends FormRequest
{
	protected $routeParameterKey;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first' => ['required'],
			'last' => ['required']
        ];
    }

    public function save()
	{
		$personable = Route::current()->parameter($this->routeParameterKey);

		$personable->name->update($this->toArray());

		flasher()->alert('Name updated successfully', Notifier::SUCCESS);
	}
}
