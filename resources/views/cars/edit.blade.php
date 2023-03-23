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
                                <input  class="form-control" type="text" name="reg_number" value="{{ $car->reg_number }}">
                            </div>
                            <div class="mb-3">
                                <label l class="form-label" >Brand</label>
                                <input  class="form-control" type="text" name="brand" value="{{ $car->brand }}">
                            </div>
                            <div class="mb-3">
                                <label l class="form-label" >Model</label>
                                <input  class="form-control" type="text" name="model" value="{{ $car->model }}">
                            </div>
                            <select class="form-select" name="owner_id">
                                @foreach($owners as $owner)
                                    <option value="{{ $owner->id }}">{{ $owner->name  }} {{ $owner->surname }}</option>
                                @endforeach
                            </select>

                            <button class="btn btn-success">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

