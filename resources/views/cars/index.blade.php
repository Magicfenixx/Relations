@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{__("Cars")}} </div>

                    <div class="card-body">
                        <a class="btn btn-info" href="{{route("cars.create")}}">{{__("Add new car")}}</a>
                        <table class="table" >
                            <thead>
                            <tr>
                                <th>{{__("Car")}}</th>
                                <th>{{__("Brand")}}</th>
                                <th>{{__("Model")}}</th>
                                <th>{{__("Owner")}}</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cars as $car)
                                <tr>

                                    <td>{{ $car->reg_number }}</td>
                                    <td>{{ $car->brand }}</td>
                                    <td>{{ $car->model }}</td>
                                    <td>{{ $car->owner->name }} {{ $car->owner->surname }}</td>
                                    <td style="width: 100px;">
                                        <a class="btn btn-success" href="{{ route("cars.edit",$car->id) }}">{{__("Edit")}}</a>
                                    </td>
                                    <td style="width: 100px;">
                                        <form method="post" action="{{ route('cars.destroy',$car->id) }}">
                                            @csrf
                                            @method("delete")
                                            <button class="btn btn-danger">{{__("Delete")}}</button>
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


