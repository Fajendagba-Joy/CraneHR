@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('employees.create') }}" class="btn btn-primary">
                        Add New Employee
                    </a>

                    <h3>List of all employees</h3>
                    @if(count($employees) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th class="">S/N</th>
                                <th class="">Name</th>
                                <th class="">Designation</th>
                                <th class="">Phone</th>
                                <th class="">Email</th>
                                <th class="">Picture</th>
                                <th class=""></th>
                            </tr>

                            {{-- @foreach ($users as $user)

                                <tr>
                                    <th class="">{{$user[0]}}</th>
                                    <th class="">{{$user[1]}}</th>
                                    <th class="">Designation</th>
                                    <th class="">Phone</th>
                                    <th class="">Email</th>
                                    <th class="">Picture</th>
                                    <th class=""></th>
                                </tr>
                                
                            @endforeach --}}


                            @foreach ($employees as $employee)
                            <tr>
                                <td class="">{{$employee->id}}</td>
                                <td class="">{{$employee->first_name.' '.$employee->middle_name}}</td>
                                <td class="">{{$employee->designation}}</td>
                                <td class="">{{$employee->phone}}</td>
                                <td class="">{{$employee->email}}</td>
                                <td class="">{{$employee->picture}}</td>
                                
                                <td class="">

                                <div class="dropdown show">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" 
                                    id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" 
                                    aria-expanded="false">
                                        Action
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('employees.edit', $employee) }}">Edit</a>
                                        <a class="dropdown-item" href="{{ route('employees.edit', $employee) }}">Delete</a>
                                    </div>
                                </div>

                                    {{-- <a href="{{ route('employees.edit', $employee) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('employees.edit', $employee) }}" class="btn btn-danger">Delete</a> --}}
                                </td>
                                
                                {{-- <td>
                                    {!!Form::open(['action' => ['EmployeeController@destroy', $employee->id], 'method' => 'POST', 'class'=>'pull-right']) !!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {!!Form::close() !!} 
                                </td> --}}
                            </tr>
                            @endforeach
                            
                            
                        </table>
                    @else
                        <p>You currently have no employee</p>
                    @endif
                    {{$employees->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
