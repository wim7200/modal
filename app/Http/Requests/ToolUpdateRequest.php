<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ToolUpdateRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'qr_code_tool' => ['required', 'string'],
            'due-time' => ['required'],
            'kind_id' => ['required', 'integer', 'exists:kinds,id'],
            'condition_id' => ['required', 'integer', 'exists:conditions,id'],
            'softdeletes' => ['required'],
        ];
    }
}
