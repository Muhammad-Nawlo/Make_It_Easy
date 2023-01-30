<?php

namespace App\Http\Requests;

use App\Enums\ActiveStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Spatie\Enum\Laravel\Rules\EnumRule;

class CreateAccountRequest extends FormRequest
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
            'name' => ['required', Rule::unique('accounts', 'name')],
            'account_type_id' => ['required', Rule::exists('account_types', 'id')],
            'parent_account_id' => ['nullable', Rule::exists('accounts', 'id')],
            'status' => ['required', new EnumRule(ActiveStatusEnum::class)],
            'start_balance' => ['required', 'numeric'],
            'current_balance' => ['required', 'numeric'],
            'note' => ['nullable', 'string'],
        ];
    }
}
