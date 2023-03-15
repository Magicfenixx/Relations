@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Cars </div>

                    <div class="card-body">
                        <a class="btn btn-info" href="{{route("cars.create")}}">Add new car</a>
                        <table class="table" >
                            <thead>
                            <tr>
                                <th>Car</th>

                                <th>Owner</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cars as $car)
                                <tr>
                                    <td>{{ $car->reg_number }}</td>
                                    <td>{{ $car->owner->name }} {{ $car->owner->surname }}</td>
                                    <td style="width: 100px;">
                                        <a class="btn btn-success" href="{{ route("cars.edit",$car->id) }}">Edit</a>
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


