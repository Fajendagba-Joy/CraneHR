@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white" style="background-color: #3a4833; color: #d1f7be;">Attendance</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($attendance_log == '0')
                        <h3>Attendance Log</h3>
                        <div class="alert alert-danger" role="alert">
                            <span>No attendance log</span>
                        </div>
                    @else
                        <div class="spinner-border text-secondary" role="status">
                            <span class="visually-hidden"></span>
                        </div>

                        <h3>Attendance Log</h3>                    

                        @if(count($attendance_log) > 0)
                            <table class="table table-dark table-borderless table-striped">
                                <tr>
                                    <th class="">User ID</th>
                                    <th class="">Name</th>
                                    <th class="">FP or RF Card</th>
                                    <th class="">Time-In</th>
                                    <th class="">Time-In Ago</th>
                                </tr>
                                

                                @foreach ($attendance_log as $attendance)

                                    <tr>
                                        <th class="">{{$attendance->user_id}}</th>
                                        <th class="">
                                            {{ $attendance->name }}
                                        </th>
                                        <th class="">
                                            {{ $attendance->type }}
                                        </th>
                                        <th class="">{{$attendance->time_in}}</th>
                                        {{-- <th class="">{{ $attendance->time_in->diffForHumans() }}</th> --}}
                                        <th class="">{{\Carbon\Carbon::parse($attendance->time_in)->diffForHumans(Carbon\Carbon::now())}}</th>
                                    </tr>
                                    
                                @endforeach
                                
                                
                            </table>
                        @else
                            <p>You currently 0 log</p>
                        @endif

                        <a href="{{ route('attendance.clearlog') }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to clear all logs?')">
                            Clear Log
                        </a>
                        
                            <a href="{{ route('device.update') }}"
                            style="background-color: #3a4833; color: #d1f7be;"
                            class="btn float-right"
                            onclick="return confirm('This will update Logs from the device to database')">
                                Update
                            </a>
                        <hr>

                    @endif                     
                    {{$attendance_log->links()}}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
