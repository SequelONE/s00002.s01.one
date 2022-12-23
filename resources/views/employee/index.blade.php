@extends('layouts.app')

@section('style')

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="display-3">Employees</h1>
                <div>
                    <a href="{{ route('employees.create')}}" class="btn btn-primary mb-3">Add employee</a>
                </div>
                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <table id="example" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Salary</th>
                            <th>Age</th>
                            <th>Image</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{$employee['id']}}</td>
                            <td><a href="{{ route('employees.show',$employee['id'])}}">{{$employee['employee_name']}}</a></td>
                            <td>{{$employee['employee_salary']}}</td>
                            <td>{{$employee['employee_age']}}</td>
                            <td>{{$employee['profile_image']}}</td>
                            <td>
                                <a href="{{ route('employees.edit',$employee['id'])}}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('employees.destroy', $employee['id'])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            <div>
        </div>
    </div>
@endsection

@section('javascripts')

@endsection