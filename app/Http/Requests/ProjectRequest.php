<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'          => 'required|min:4|max:255',
            'description'   => 'min:10',
            'category'      => 'required|min:4|max:255',
            'start_date'    => 'required|date_format:Y-m-d|max:10',
            'end_date'      => 'nullable|date_format:Y-m-d|max:255',
            'type_id'       => 'required',
            'is_closed'     => 'required',
            // 'slug'
        ];
    }
}
