@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{__("New owner")}}</div>

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
                        <form method="post" action="{{ route('owners.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">{{__("Name")}}</label>
                                <input  class="form-control @error("name") is-invalid @enderror" type="text" name="name" value="{{  old("name") }}">
                                <div class="invalid-feedback"> @error("name") {{$message}} @enderror</div>

                            </div>
                            <div class="mb-3">
                                <label class="form-label" >{{__("Surname")}}</label>
                                <input  class="form-control @error("surname") is-invalid @enderror" type="text" name="surname" value="{{  old("surname") }}">
                                <div class="invalid-feedback"> @error("surname") {{$message}} @enderror</div>

                            </div>
                            <button class="btn btn-success">{{__("Add")}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
