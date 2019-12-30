<?php

namespace LaravelEnso\Departments\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidateDepartmentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', $this->unique()],
            'description' => 'required|string',
        ];
    }

    protected function unique()
    {
        return Rule::unique('departments', 'name')
            ->ignore(optional($this->route('department'))->id);
    }
}
