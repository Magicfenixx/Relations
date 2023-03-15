@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Car</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('cars.update',$car->id) }}">
                            @csrf
                            @method("put")
                            <div class="mb-3">
                                <label class="form-label">Reg_number</label>
                                <input  class="form-control" type="text" name="name" value="{{ $car->reg_number }}">
                            </div>
                            <div class="mb-3">
                                <label l class="form-label" >Brand</label>
                                <input  class="form-control" type="text" name="surname" value="{{ $car->brand }}">
                            </div>
                            <div class="mb-3">
                                <label l class="form-label" >Model</label>
                                <input  class="form-control" type="text" name="surname" value="{{ $car->model }}">
                            </div>
                            <div class="mb-3">
                                <label l class="form-label" >Owner Name</label>
                                <input  class="form-control" type="text" readonly name="surname" value="{{ $car->owner->name }}">
                            </div>
                            <div class="mb-3">
                                <label l class="form-label" >Owner Surname</label>
                                <input  class="form-control" type="text" readonly name="surname" value="{{ $car->owner->surname }}">
                            </div>

                            <button class="btn btn-success">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

