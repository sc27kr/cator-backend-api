<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class RegisterRequest extends FormRequest
{

    private $breeds;
    private $colors;

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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $this->breeds = array(
            'turkish_angora',
            'siamese',
            'scottish_fold',
            'russian_blue',
            'munchkin',
            'korean_short_hair',
            'snowshoe',
        );

        $this->colors = array(
            'white',
            'gray',
            'black',
            'tricolor',
            'tuxedo',
            'mackerel',
            'cheese',
        );

        return [
            // 'name' => 'required|string|max:150',
            'email' => 'required|email|max:150|unique:users',
            'password' => 'required|confirmed',
            'breed' => 'required|in:' . implode(',', $this->breeds),
            'age' => 'required|between:1,15',
            'color' => 'required|in:' . implode(',', $this->colors),
            'is_mentor' => 'required|between:0,1',
        ];
    }

    public function getData()
    {
        $data = $this->validated();
        $data['password'] = Hash::make($data['password']);
        return $data;
    }
}
