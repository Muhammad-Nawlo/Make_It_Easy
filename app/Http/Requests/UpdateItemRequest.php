<?php

namespace App\Http\Requests;

use App\Enums\ActiveStatusEnum;
use App\Enums\ItemStatusEnum;
use App\Enums\ItemTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Spatie\Enum\Laravel\Rules\EnumRule;

class UpdateItemRequest extends FormRequest
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
            'name' => ['required', 'string', Rule::unique('items', 'name')->ignore($this->item->id)],
            'type' => ['required', new EnumRule(ItemTypeEnum::class)],
            'status' => ['required', new EnumRule(ActiveStatusEnum::class)],
            'category' => ['required', Rule::exists('categories', 'id')],
            'purchasing_price' => ['required', 'numeric', 'min:0'],
            'main_unit' => ['required', Rule::exists('units', 'id')],
            'main_unit_wholesale_price' => ['required', 'numeric', 'min:0'],
            'main_unit_half_wholesale_price' => ['required', 'numeric', 'min:0'],
            'main_unit_consumer_price' => ['required', 'numeric', 'min:0'],
            'secondary_unit' => ['nullable', 'array'],
            'secondary_unit.*' => ['required', 'integer', Rule::exists('units', 'id')],
            'wholesale_price' => [Rule::requiredIf(function () {
                return isset($this->secondary_unit) && !empty($this->secondary_unit);
            }), 'array'],
            'wholesale_price.*' => [Rule::requiredIf(function () {
                return isset($this->secondary_unit) && !empty($this->secondary_unit);
            }), 'numeric', 'min:0'],
            'half_wholesale_price' => [Rule::requiredIf(function () {
                return isset($this->secondary_unit) && !empty($this->secondary_unit);
            }), 'array'],
            'half_wholesale_price.*' => [Rule::requiredIf(function () {
                return isset($this->secondary_unit) && !empty($this->secondary_unit);
            }), 'numeric', 'min:0'],
            'consumer_price' => [Rule::requiredIf(function () {
                return isset($this->secondary_unit) && !empty($this->secondary_unit);
            }), 'array'],
            'consumer_price.*' => [Rule::requiredIf(function () {
                return isset($this->secondary_unit) && !empty($this->secondary_unit);
            }), 'numeric', 'min:0'],
            'percentage' => [Rule::requiredIf(function () {
                return isset($this->secondary_unit) && !empty($this->secondary_unit);
            }), 'array'],
            'percentage.*' => [Rule::requiredIf(function () {
                return isset($this->secondary_unit) && !empty($this->secondary_unit);
            }), 'numeric', 'min:0'],
            'img' => ['nullable', 'image'],
            'barcode' => ['nullable', 'string'],
            'has_fixed_price' => ['nullable', 'integer'],
        ];
    }
    public function validated($key = null, $default = null)
    {
        $units = [];
        $units[$this->main_unit] = [
            'percentage' => 100,
            "wholesale_price" => $this->main_unit_wholesale_price,
            "half_wholesale_price" => $this->main_unit_half_wholesale_price,
            "consumer_price" => $this->main_unit_consumer_price,
        ];
        if ($this->secondary_unit) {
            foreach ($this->secondary_unit as $key => $value) {
                $units[$value] = [
                    'percentage' => $this->percentage[$key],
                    "wholesale_price" => $this->wholesale_price[$key],
                    "half_wholesale_price" => $this->half_wholesale_price[$key],
                    "consumer_price" => $this->consumer_price[$key],
                ];
            }
        }

        return [
            "name" => $this->name,
            "type" => $this->type,
            "status" => $this->status,
            "category" => $this->category,
            "purchasing_price" => $this->purchasing_price,
            "units" => $units,
            "img" => $this->img,
            "barcode" => $this->barcode,
            "has_fixed_price" => $this->has_fixed_price,
        ];
    }
}
