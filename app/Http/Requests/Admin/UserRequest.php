<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class UserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (auth()->guest()) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $act = Request::route('act');
        if ($act == 'add') {
            return [
                'name' => 'required|alpha_dash|max:32|unique:user,name',
                'password' => 'required|min:6|max:32',
                'email' => 'email'
            ];
        } else {
            return [
                'name' => 'required|alpha_dash|unique:user,name',
                'password' => 'min:6|max:32',
                'email' => 'email'
            ];
        }
    }
}
