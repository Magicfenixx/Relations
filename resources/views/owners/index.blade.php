@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Owners </div>

                    <div class="card-body">
                        <a class="btn btn-info" href="{{route("owners.create")}}">Add new Owner</a>
                        <table class="table" >
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Surname</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($owners as $owner)
                                <tr>
                                    <td>{{ $owner->name }}</td>
                                    <td>{{ $owner->surname }}</td>
                                    <td>
                                        @foreach($owner->cars as $car)
                                            {{ $car->reg_number }}
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
