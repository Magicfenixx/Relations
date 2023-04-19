@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{__("Edit owner")}}</div>

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
                        <form method="post" action="{{ route('owners.update',$owner->id) }}">
                            @csrf
                            @method("put")
                            <div class="mb-3">
                                <label class="form-label">{{__("Name")}}</label>
{{--                                <input  class="form-control" type="text" name="name" value="{{ $owner->name }}">--}}
                                <input  class="form-control @error("name") is-invalid @enderror" type="text" name="name" value="{{  $owner->name }}">
                                <div class="invalid-feedback"> @error("name") {{$message}} @enderror</div>


                            </div>
                            <div class="mb-3">
                                <label l class="form-label" >{{__("Surname")}}</label>
                                <input  class="form-control @error("surname") is-invalid @enderror" type="text" name="surname" value="{{  $owner->surname }}">
                                <div class="invalid-feedback"> @error("surname") {{$message}} @enderror</div>
                            <button class="btn btn-success">{{__("Update")}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

