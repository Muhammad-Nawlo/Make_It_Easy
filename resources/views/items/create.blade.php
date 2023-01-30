@extends('layouts.app')

@section('title', 'Create Item')

@section('content')
    <section class="p-2">
        <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data" id="item-form"
              class="with-stepper">
            @csrf
            <div class="steps my-3">
                <progress id="progress" value=0 max=100></progress>
                <div class="step-item">
                    <button class="step-button active text-center" type="button" data-index="0">
                        1
                    </button>
                    <div class="step-title">
                        General Info
                    </div>
                </div>
                <div class="step-item">
                    <button class="step-button text-center" type="button" data-index="1">
                        2
                    </button>
                    <div class="step-title">
                        Units and prices
                    </div>
                </div>
                <div class="step-item">
                    <button class="step-button text-center" type="button" data-index="2">
                        3
                    </button>
                    <div class="step-title">
                        Summary
                    </div>
                </div>
            </div>
            <fieldset>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    <x-input-error name="name"/>

                </div>
                <div class="mb-3">
                    <label for="barcode" class="form-label">Barcode</label>
                    <input type="text" class="form-control" id="barcode" name="barcode" value="{{ old('barcode') }}">
                    <x-input-error name="barcode"/>

                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-control" id="type" name="type">
                        @foreach ($itemTypes as $key => $type)
                            <option value="{{ $key }}" {{ old('type') == $key ? 'selected' : '' }}>
                                {{ $type }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error name="type"/>

                </div>
                <x-active-status type="create"/>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-control" id="category" name="category">
                        @foreach ($categories as $category)
                            <option
                                value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error name="category"/>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="mb-3">
                            <label for="purchasing_price" class="form-label">Purchasing price</label>
                            <input type="number" min="0" class="form-control" id="purchasing_price"
                                   name="purchasing_price" value="{{ old('purchasing_price') }}">
                            <x-input-error name="purchasing_price"/>

                        </div>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="has_fixed_price" name="has_fixed_price"
                                   value="1">
                            <label class="form-check-label" for="has_fixed_price">
                                Has Fixed Price
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="mb-3">
                            <label for="img" class="form-label">Image</label>
                            <input type="file" class="form-control" id="item-img" name="img" accept="image/*">
                            <x-input-error name="img"/>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary float-end next" data-index="1" type="button">Next</button>
            </fieldset>
            <fieldset>
                <div class="mb-3">
                    <label for="main_unit" class="form-label">Main Unit</label>
                    <select class="form-control" id="main_unit" name="main_unit">
                        @foreach ($mainUnits as $unit)
                            <option value="{{ $unit->id }}" {{ old('main_unit') == $unit->id ? 'selected' : '' }}>
                                {{ $unit->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error name="main_unit"/>

                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="main_unit_wholesale_price" class="form-label">Wholesale price</label>
                            <input type="number" min="0" class="form-control" id="main_unit_wholesale_price"
                                   name="main_unit_wholesale_price" value="{{ old('main_unit_wholesale_price') }}">
                            <x-input-error name="main_unit_wholesale_price"/>

                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="main_unit_half_wholesale_price" class="form-label">Half wholesale price</label>
                            <input type="number" min="0" class="form-control"
                                   id="main_unit_half_wholesale_price" name="main_unit_half_wholesale_price"
                                   value="{{ old('main_unit_half_wholesale_price') }}">
                            <x-input-error name="main_unit_half_wholesale_price"/>

                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="main_unit_consumer_price" class="form-label">Consumer price</label>
                            <input type="number" min="0" class="form-control" id="main_unit_consumer_price"
                                   name="main_unit_consumer_price" value="{{ old('main_unit_consumer_price') }}">
                            <x-input-error name="main_unit_consumer_price"/>
                        </div>
                    </div>
                </div>
                <div id="secondary-units">

                </div>
                <button type="button" class="btn btn-primary d-flex align-content-center my-3" id="add-secondary-units">
                    Add secondary units <span class="material-icons">add_circle</span>
                </button>

                <button class="btn btn-success  float-start previous d-block" data-index="0" type="button">Previous
                </button>
                <button class="btn btn-primary float-end next d-block" data-index="2" type="button">Next</button>
            </fieldset>
            <fieldset id="summary">
                <ul class="list-group list-group-horizontal-xxl p-2 pt-3">
                    <li class="list-group-item">
                        <div class="row">
                            <h5 class="col-3">Name: </h5>
                            <p class="col-9" id="name"></p>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <h5 class="col-3">Barcode :</h5>
                            <p class="col-9" id="barcode"></p>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <h5 class="col-3">Type :</h5>
                            <p class="col-9" id="type"></p>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <h5 class="col-3">Status :</h5>
                            <p class="col-9" id="status"></p>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <h5 class="col-3">Category :</h5>
                            <p class="col-9" id="category"></p>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <h5 class="col-3">Purchasing price :</h5>
                            <p class="col-9" id="purchasing_price"></p>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <h5 class="col-3">Has fixed price :</h5>
                            <p class="col-9" id="has_fixed_price"></p>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5>Image :</h5>
                            <div>
                                <img class="img-fluid img-thumbnail rounded  mx-auto d-block" id="image"
                                     width="250px" height="250px">
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-flex justify-content-center mt-2">
                            <h4 class="" id="">Main unit :</h4>
                            <p class="h4" id="main_unit"></p>
                        </div>
                        <table class="table table-responsive text-center table-borderless">
                            <thead>
                            <th>Wholesale price</th>
                            <th>Half wholesale price</th>
                            <th>Consumer price</th>
                            </thead>
                            <tbody>
                            <td id="main_unit_wholesale_price"></td>
                            <td id="main_unit_half_wholesale_price"></td>
                            <td id="main_unit_consumer_price"></td>
                            </tbody>
                        </table>
                    </li>
                    {{--secondary units summary--}}
                    <section>

                    </section>
                </ul>
                <button class="btn btn-success previous d-block float-start" data-index="1" type="button">Previous
                </button>
                <button class="btn btn-primary d-block float-end" type="submit">Submit</button>
            </fieldset>

        </form>
    </section>
@endsection
