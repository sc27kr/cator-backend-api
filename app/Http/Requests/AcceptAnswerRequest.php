<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class AcceptAnswerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    public function authorize(): bool
    {
        $answer = $this->route('answer');
        $user = Auth::user();

        if ($user->id !== $answer->question->owner->id) {
            return false;
        }

        foreach ($answer->question->answers as $answer) {
            if ($answer->is_accepted) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'is_accepted' => 'required|boolean',
        ];
    }
}
