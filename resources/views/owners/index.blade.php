{{--@extends('layouts.app')--}}

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Owners </div>

                    <div class="card-body">
                        <a class="btn btn-info" href="{{route("owners.create")}}">Add new Owner</a>
                        <hr>
                        <form method="POST" action="{{ route("owners.search") }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Name:</label>
                                <input class="form-control" name="name" value="{{ $searchOwnerName }}">
                            </div>
                            <button class="btn btn-success">Search</button>
                        </form>
                        <hr>
                        <hr>
                        <form method="POST" action="{{ route("owners.search") }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Surname:</label>
                                <input class="form-control" name="name" value="{{ $searchOwnerSurname }}">
                            </div>
                            <button class="btn btn-success">Search</button>
                        </form>
                        <hr>
                        <table class="table" >
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Car</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($owners as $owner)
                                <tr>
                                    <td>{{ $owner->name }}</td>
                                    <td>{{ $owner->surname }}</td>
                                    <td>
                                        @foreach($owner->cars as $car)

                                           REG_NUMBER:{{ $car->reg_number }}
                                            BRAND:  {{ $car->brand }}
                                            MODEL:  {{ $car->model }}  <p class p-2></p>
                                        @endforeach
                                    </td>
                                    <td style="width: 100px;">
                                        <a class="btn btn-success" href="{{ route("owners.edit",$owner->id) }}">Edit</a>
                                    </td>
                                    <td style="width: 100px;">
                                        <form method="post" action="{{ route('owners.destroy',$owner->id) }}">
                                            @csrf
                                            @method("delete")
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
