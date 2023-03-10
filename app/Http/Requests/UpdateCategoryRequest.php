<?php

namespace App\Http\Requests;

use App\Enums\ActiveStatusEnum;
use App\Enums\CategoryStatusEnum;
use App\Enums\InvoiceTypeStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Spatie\Enum\Laravel\Rules\EnumRule;

class UpdateCategoryRequest extends FormRequest
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
            'name' => ['required', 'string', Rule::unique('categories', 'name')->ignore($this->category->id)],
            'status' => ['required', new EnumRule(ActiveStatusEnum::class)]
        ];
    }
}
