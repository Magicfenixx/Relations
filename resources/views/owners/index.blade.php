@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{__("Owners")}} </div>

                    <div class="card-body">
                        <a class="btn btn-info" href="{{route("owners.create")}}">{{__("Add new Owner")}}</a>
                        <hr>
                        <form method="POST" action="{{ route("owners.search") }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">{{__("Name")}}:</label>
                                <input class="form-control" name="name" value="{{ $searchOwnerName }}">
                            </div>
                            <button class="btn btn-success">{{__("Search")}}</button>
                        </form>
                        <hr>
                        <hr>
                        <form method="POST" action="{{ route("owners.search") }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">{{__("Surname")}}:</label>
                                <input class="form-control" name="surname" value="{{ $searchOwnerSurname }}">
                            </div>
                            <button class="btn btn-success">{{__("Search")}}</button>
                        </form>
                        <hr>
                        <table class="table" >
{{--                            @can('view', \App\Models\Owner::class)--}}
                            <thead>
                            <tr>
                                <th>{{__("Name")}}</th>
                                <th>{{__("Surname")}}</th>
                                <th>{{__("Car")}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($owners as $owner)
                                <tr>
                                    <td>{{ $owner->name }}</td>
                                    <td>{{ $owner->surname }}</td>
                                    <td>
                                        @foreach($owner->cars as $car)

                                        {{__("Car")}}:{{ $car->reg_number }}
                                        {{__("Brand")}}:  {{ $car->brand }}
                                        {{__("Model")}}:  {{ $car->model }}  <p class p-2></p>
                                        @endforeach
                                    </td>
                                    <td style="width: 100px;">
                                        <a class="btn btn-success" href="{{ route("owners.edit",$owner->id) }}">{{__("Edit")}}</a>
                                    </td>
                                    <td style="width: 100px;">
                                        <form method="post" action="{{ route('owners.destroy',$owner->id) }}">
                                            @csrf
                                            @method("delete")
                                            <button class="btn btn-danger">{{__("Delete")}}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
{{--                            @endcan--}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
