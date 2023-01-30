<?php

namespace App\Http\Controllers\Api\Address;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function country()
    {
        return Country::query()->get()->map(function ($country) {
            return ['id' => $country->id, 'text' => $country->name];
        });
    }

    public function city()
    {
        return City::query()->get()->map(function ($city) {
            return ['id' => $city->id, 'text' => $city->name];
        });
    }

    public function state()
    {
        return State::query()->get()->map(function ($state) {
            return ['id' => $state->id, 'text' => $state->name];
        });
    }
}
