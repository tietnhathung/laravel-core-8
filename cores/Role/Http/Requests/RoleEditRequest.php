<?php

namespace Core\Role\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleEditRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please enter user groups name!',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'User groups name',
   
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
