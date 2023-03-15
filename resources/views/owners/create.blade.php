@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit owner</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('owners.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input  class="form-control" type="text" name="name" value="">
                            </div>
                            <div class="mb-3">
                                <label l class="form-label" >Surname</label>
                                <input  class="form-control" type="text" name="surname" value="">
                            </div>
                            <button class="btn btn-success">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
