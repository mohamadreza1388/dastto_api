<?php

namespace App\Http\Requests\Auth;

use App\ApiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AuthRequest extends FormRequest
{
    use ApiResponseTrait;

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
     * @return array<string, array<mixed>|string>
     */
    public function rules(): array
    {
        return ['mobile' => 'required|digits:11'];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->fail($validator->errors(), 'Validation error', 400));
    }
}
