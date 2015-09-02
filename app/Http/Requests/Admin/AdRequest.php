<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class AdRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(auth()->guest()){
            //return false;
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
        return [
            'title' => 'required',
            'width' => 'integer',
            'height' => 'integer',
            'start_show' => 'date',
            'end_show' => 'date',
            'position_id' => 'integer',
            'order' => 'integer'
        ];
    }
}
