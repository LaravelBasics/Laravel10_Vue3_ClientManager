<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MaterialRequest extends FormRequest
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
        $branchOfficeId = $this->route('id');
        
        return [
            'language_id' => 'required|exists:languages,id',
            'title' => 'required|string|max:50',
            'code' => [
                'required',
                'numeric',
                'max_digits:10',
                Rule::unique('materials', 'code')
                    ->ignore($branchOfficeId) // 自身を除外
                    ->whereNull('deleted'), // 削除されていない物を対象
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'language_id' => 'プログラミング言語',
            'title' => '教材',
            'code' => '教材コード',
        ];
    }

    public function messages(): array
    {
        return [
            'language_id.required' => __('validation.required_select'),
            // 他のカスタムメッセージ...
        ];
    }
}