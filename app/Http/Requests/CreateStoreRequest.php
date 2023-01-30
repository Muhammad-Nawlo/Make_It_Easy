<?php

namespace App\Http\Requests;

use App\Enums\ActiveStatusEnum;
use App\Enums\StoreStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\Enum\Laravel\Rules\EnumRule;

class CreateStoreRequest extends FormRequest
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
            'name' => ['required', 'unique:stores,name'],
            'status' => ['required', new EnumRule(ActiveStatusEnum::class)],
            'address' => ['string', 'nullable'],
            'phone' => ['string', 'nullable'],
        ];
    }
}
