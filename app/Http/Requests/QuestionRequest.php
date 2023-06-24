<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{

    private $question_types;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $this->question_types = array(
            'food',
            'grooming',
            'butler_review',
        );

        return [
            'title' => 'required',
            'content' => 'required',
            'question_type' => 'required|in:' . implode(',', $this->question_types),
        ];
    }
}
