@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit car</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('cars.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Reg_number</label>
                                <input  class="form-control" type="number" name="reg_number" value="">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Brand</label>
                                <input  class="form-control" type="text" name="brand" value="">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Model</label>
                                <input  class="form-control" type="text" name="model" value="">
                            </div>

                            <div class="mb-3">
                                <label l class="form-label" >Owner</label>

                                <select class="form-select" name="owner_id">
                                    @foreach($owners as $owner)
                                        <option value="{{ $owner->id }}">{{ $owner->name  }} {{ $owner->surname }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button class="btn btn-success">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

