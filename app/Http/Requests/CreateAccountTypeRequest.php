<?php

namespace App\Http\Requests;

use App\Enums\ActiveStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Spatie\Enum\Laravel\Rules\EnumRule;

class CreateAccountTypeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('account_types', 'name')],
            'status' => ['required', new EnumRule(ActiveStatusEnum::class)],
            'related_internal_account' => ['required', Rule::in([0, 1])],
        ];
    }
}
