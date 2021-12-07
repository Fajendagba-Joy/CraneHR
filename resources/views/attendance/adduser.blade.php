@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white" style="background-color: #3a4833; color: #d1f7be;">Add user</div>

                <div class="card-body">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <p><strong>Opps Something went wrong</strong></p>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                    @endif

                    <form action="{{ route('attendance.adduser') }}" method="post">
                        @csrf

                        <div class="d-flex align-items-center mb-3 pb-1">
                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                            <span class="h1 fw-bold mb-0">Add User</span>
                        </div>

                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Fill in the form to add user to the device</h5>

                        <div class="form-outline mb-4">
                            <input type="name" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" class="form-control form-control-lg @error('name') border-red-500 @enderror" />
                            <label class="form-label" for="name">Employee Name</label>
                            @error('name')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-2 pb-2">
                                <div class="form-outline">
                                    <input type="password" name="password" id="password"
                                    class="form-control form-control-lg @error('password') border-red-500 @enderror" 
                                    value="{{ old('password') }}" required autocomplete="password">
                                    <label class="form-label" for="password" style="margin-left: 0px;">Choose a password</label>
                                    @error('password')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 68.8px;"></div><div class="form-notch-trailing"></div></div></div>
                            </div>

                            <div class="col-md-6 mb-2 pb-2">
                                <div class="form-outline">
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control form-control-lg @error('password_confirmation') border-red-500 @enderror" 
                                    value="{{ old('password') }}" required autocomplete="password_confirmation">
                                    <label class="form-label" for="password_confirmation" style="margin-left: 0px;">Repeat Password</label>
                                    @error('password_confirmation')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 68.8px;"></div><div class="form-notch-trailing"></div></div></div>
                            </div>
                        </div>

                        <div class="form-group col-md-6 mb-2 pb-2">
                           <label for="role">Assign a Role (select one):</label>
                            <select name="role" class="form-control @error('role') border-red-500 @enderror" id="role">
                                <option value="1">User</option>
                                <option value="14">Admin</option>
                            </select>
                            @error('role')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- <select name="brand" style="margin-bottom: 20px !important;" class="custom-select mr-sm-2" >
                            @foreach($brands as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach

                            for dynamic
                        </select> --}}

                        <div class="pt-1 mb-4">
                            <button class="btn btn-dark btn-lg btn-block" type="submit">Add user</button>
                        </div>
                    </form>
                            
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
