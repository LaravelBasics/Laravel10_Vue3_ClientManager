<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LearningDayRequest extends FormRequest
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
        $departmentId = $this->route('id');
        return [
            'language_id' => 'required|exists:languages,id',
            'material_id' => 'required|exists:materials,id',
            'days' => 'required|string|max:50',
            'code' => [
                'required',
                'numeric',
                'max_digits:10',
                Rule::unique('learning_days', 'code')
                    ->ignore($departmentId)
                    ->whereNull('deleted'),
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'language_id' => 'プログラミング言語',
            'material_id' => '教材',
            'days' => '学習日数',
            'code' => '学習日数コード',
        ];
    }

    public function messages(): array
    {
        return [
            'language_id.required' => __('validation.required_select'),
            'material_id.required' => __('validation.required_select'),
            // 他のカスタムメッセージ...
        ];
    }
}