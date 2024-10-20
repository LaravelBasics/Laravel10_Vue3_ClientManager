<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArtifactRequest extends FormRequest
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
        $sectionId = $this->route('id');

        return [
            'language_id' => 'required|exists:languages,id',
            'material_id' => 'required|exists:materials,id',
            'learning_day_id' => 'nullable|exists:learning_days,id',
            'code' => [
                'required',
                'numeric',
                'max_digits:10',
                Rule::unique('artifacts', 'code')
                    ->ignore($sectionId)
                    ->whereNull('deleted'),
            ],
            'artifact_name' => 'required|string|max:50',
            'tel' => 'required|string|max:13|regex:/^\d{2,4}-\d{2,4}-\d{3,4}$/',
            'fax' => 'required|string|max:13|regex:/^\d{2,4}-\d{2,4}-\d{3,4}$/',
        ];
    }

    public function attributes(): array
    {
        return [
            'language_id' => 'プログラミング言語',
            'material_id' => '教材',
            'learning_day_id' => '学習日数ID',
            'code' => '成果物コード',
            'artifact_name' => '成果物の名前',
            'tel' => 'TEL',
            'fax' => 'FAX',
        ];
    }

    public function messages(): array
    {
        return [
            'language_id.required' => __('validation.required_select'),
            'material_id.required' => __('validation.required_select'),
            'tel.regex' => __('validation.tel.regex'),
            'fax.regex' => __('validation.fax.regex'),
            // 他のカスタムメッセージ...
        ];
    }
}
