@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{__("Edit Car")}}</div>

                    <div class="card-body">
                        <!--
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                @foreach( $errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
@endif
                        -->
                        <form method="post" action="{{ route('cars.update',$car->id) }}"  enctype="multipart/form-data" >
                            @csrf
                            @method("put")
                            <div class="mb-3">
                                <label class="form-label">{{__("Reg_number")}}</label>
                                <input  class="form-control @error("reg_number") is-invalid @enderror" type="text" name="reg_number" value="{{  $car->reg_number }}">
                                <div class="invalid-feedback"> @error("reg_number") {{$message}} @enderror</div>
                            </div>
                            <div class="mb-3">
                                <label l class="form-label" >{{__("Brand")}}</label>
                                <input  class="form-control" type="text" name="brand" value="{{ $car->brand }}">
                            </div>
                            <div class="mb-3">
                                <label l class="form-label" >{{__("Model")}}</label>
                                <input  class="form-control" type="text" name="model" value="{{ $car->model }}">
                            </div>
                            <select class="form-select" name="owner_id">
                                @foreach($owners as $owner)
                                    <option value="{{ $owner->id }}">{{ $owner->name  }} {{ $owner->surname }}</option>
                                @endforeach
                            </select>
                            <div class="mb-3">
                                <label  class="form-label" >{{__("Image")}}</label>
                                <input  class="form-control" type="file" name="image" value="{{ $images->image }}">
                            </div>
                            <button class="btn btn-success">{{__("Update")}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

