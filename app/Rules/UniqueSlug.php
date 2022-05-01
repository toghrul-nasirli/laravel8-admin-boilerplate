<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UniqueSlug implements Rule
{
    private $model, $id;

    public function __construct($model, $id = null)
    {
        $this->model = $model;
        $this->id = $id;
    }

    public function passes($attribute, $value)
    {
        if ($this->id) {
            if ($this->model::find($this->id)->slug != _slugify($value)) {
                return !$this->model::where('slug->' . _lang(), _slugify($value))->exists();
            }

            return true;
        }

        return !$this->model::where('slug->' . _lang(), _slugify($value))->exists();
    }

    public function message()
    {
        return __('validation.unique');
    }
}
