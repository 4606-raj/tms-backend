<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'family_id' => 'required',
            'mobile' => 'required',
            // 'auto_close' => 'required',
            'district' => 'required',
            'type' => 'required',
            'source' => 'required',
            'channel' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'child_sub_category_id' => 'required',
            'description' => 'required',
            // 'attachment' => 'required',
        ];
    }
}
