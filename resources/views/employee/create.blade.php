@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <h1 class="display-3">Add employee</h1>
                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                    <form method="post" action="{{ route('employees.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="stock_name">Name:*</label>
                            <input type="text" class="form-control" name="name"/>
                        </div>

                        <div class="form-group">
                            <label for="ticket">Salary:*</label>
                            <input type="text" class="form-control" name="salary"/>
                        </div>

                        <div class="form-group">
                            <label for="value">Age:</label>
                            <input type="text" class="form-control" name="age"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Add employee</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection