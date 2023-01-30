<?php

namespace App\Http\Requests;

use App\Models\DeliveryTreasure;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDeliveryTreasureRequest extends FormRequest
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
        $deliveryTreasure = DeliveryTreasure::query()->where([
            'treasure_id' => $this->treasure->id,
            'delivery_treasure_id' => $this->deliveryTreasure->id,
        ])->first();
        return [
            'delivery_treasure_id' => ['required', 'integer', Rule::exists('treasures', 'id'), Rule::unique('delivery_treasures', 'delivery_treasure_id')->ignore($deliveryTreasure->id)]
        ];
    }
}
