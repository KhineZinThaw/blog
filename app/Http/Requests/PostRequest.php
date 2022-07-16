<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'body' => 'required|min:5',
            // 'image' => 'required|file|mimes:jpg,jpeg,png',
            'images' => 'required|array',
            'images.*' => 'required|file|mimes:jpg,jpeg,png',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'ခေါင်းစဉ်ဖြည့်ရန် လိုအပ်ပါသည်။',
            'body.required' => 'စာပိုဒ်ဖြည့်ရန် လိုအပ်ပါသည်။',
            'body.min' => 'စာပိုဒ်သည် အနည်းဆုံး စာလုံး 5 လုံးအထိ လိုအပ်သည်',
        ];
    }
}
