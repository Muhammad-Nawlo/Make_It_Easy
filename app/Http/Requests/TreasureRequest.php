<?php

namespace App\Http\Requests;

use App\Enums\ActiveStatusEnum;
use App\Enums\TreasureStatusEnum;
use App\Enums\TreasureTypeEnum;
use BenSampo\Enum\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Spatie\Enum\Laravel\Rules\EnumRule;

class TreasureRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'status' => ['required', new EnumRule(ActiveStatusEnum::class)],
            'type' => ['required', new EnumRule(TreasureTypeEnum::class)],
            'last_income_invoice_number' => ['required', 'min:0'],
            'last_outcome_invoice_number' => ['required', 'min:0'],
        ];
    }
}
