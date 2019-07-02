<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LectureRequest extends FormRequest
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
            'sifPred' => 'required',
            'kratPred' => 'nullable|max:8',
            'nazPred' => 'required|max:60',
            'sifOrgjed' => 'nullable|integer',
            'upisanoStud' => 'nullable|integer|min:0',
            'brojSatiTjedno' => 'nullable|integer|min:0',
        ];
    }
}
