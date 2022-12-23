@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="display-3">Employees</h1>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Salary</td>
                        <td>Age</td>
                        <td>Image</td>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$employee['id']}}</td>
                            <td><a href="{{ route('employees.show',$employee['id'])}}">{{$employee['employee_name']}}</a></td>
                            <td>{{$employee['employee_salary']}}</td>
                            <td>{{$employee['employee_age']}}</td>
                            <td>{{$employee['profile_image']}}</td>
                        </tr>
                    </tbody>
                </table>
                <div>
                </div>
            </div>
@endsection