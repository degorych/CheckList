<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckListRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'check-list-title' => 'required|max:30',
            'check-list-description' => 'required|max:200',
            'item-title.*' => 'required|max:30',
            'item-description.*' => 'required|max:200',
            'item-order.*' => 'required|integer|max:100',
        ];
    }
}
