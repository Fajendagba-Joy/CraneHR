@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <form action="{{ route('employee') }}" method="post">
        @csrf
        
            <div class="card-body p-0">
                <div class="row g-0">
                    <div class="col-lg-6">
                        <div class="p-5">
                            <h3 class="fw-normal mb-3" style="color: #4835d4;">Your Infomation</h3>

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


                            <div class="mb-2 pb-2">
                                <div class="form-outline">
                                    <input type="text" name="first_name" id="first_name"
                                    class="form-control form-control-lg @error('first_name') border-red-500 @enderror" 
                                    value="{{ old('first_name') }}" required autocomplete="first_name">
                                    <label class="form-label" for="first_name" style="margin-left: 0px;">First name *</label>
                                    @error('first_name')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-2 pb-2">
                                    <div class="form-outline">
                                        <input type="text" name="middle_name" id="middle_name"
                                        class="form-control form-control-lg @error('middle_name') border-red-500 @enderror" 
                                        value="{{ old('middle_name') }}" autocomplete="password">
                                        <label class="form-label" for="middle_name" style="margin-left: 0px;">Middle name</label>
                                        @error('middle_name')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 68.8px;"></div><div class="form-notch-trailing"></div></div></div>
                                </div>

                                <div class="col-md-6 mb-2 pb-2">
                                    <div class="form-outline">
                                        <input type="text" name="last_name" id="last_name"
                                        class="form-control form-control-lg @error('last_name') border-red-500 @enderror" 
                                        value="{{ old('last_name') }}" required autocomplete="last_name">
                                        <label class="form-label" for="last_name" style="margin-left: 0px;">Last name *</label>
                                        @error('last_name')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 68.8px;"></div><div class="form-notch-trailing"></div></div></div>
                                </div>
                            </div>

                            <div class="mb-4 pb-2">
                                <div id="select-wrapper-470298" class="select-wrapper">
                                <label class="form-label" for="last_name" style="margin-left: 0px;">Gender</label>
                                <div class="form-outline">
                                  <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 0px;"></div><div class="form-notch-trailing"></div></div></div>
                                  <select class="select select-initialized">
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                  </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-2 pb-2">
                                    <div class="form-outline">
                                        <input type="text" name="middle_name" id="middle_name"
                                        class="form-control form-control-lg @error('middle_name') border-red-500 @enderror" 
                                        value="{{ old('middle_name') }}" autocomplete="middle_name">
                                        <label class="form-label" for="middle_name" style="margin-left: 0px;">Email Address</label>
                                        @error('middle_name')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 68.8px;"></div><div class="form-notch-trailing"></div></div></div>
                                </div>

                                <div class="col-md-6 mb-2 pb-2">
                                    <div class="form-outline">
                                        <input type="text" name="phone" id="phone"
                                        class="form-control form-control-lg @error('phone') border-red-500 @enderror" 
                                        value="{{ old('phone') }}" autocomplete="phone">
                                        <label class="form-label" for="phone" style="margin-left: 0px;">Phone No</label>
                                        @error('phone')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 68.8px;"></div><div class="form-notch-trailing"></div></div></div>
                                </div>
                            </div>                             

                            <div class="mb-2 pb-2">
                                <div class="form-outline">
                                    <input type="text" name="address" id="address" 
                                    class="form-control form-control-lg @error('address') border-red-500 @enderror" 
                                    value="{{ old('address') }}" autocomplete="address">
                                    <label class="form-label" for="address" style="margin-left: 0px;">House Address</label>
                                    @error('address')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                </div>
                            </div>
                            
                            <div class="mb-2 pb-2">
                                <div class="form-outline">
                                    <input type="text" name="country" id="country" 
                                    class="form-control form-control-lg @error('country') border-red-500 @enderror" 
                                    value="{{ old('country') }}" autocomplete="country">
                                    <label class="form-label" for="country" style="margin-left: 0px;">Country</label>
                                    @error('country')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-2 pb-2">
                                    <div class="form-outline">
                                        <input type="text" name="state" id="state"
                                        class="form-control form-control-lg @error('state') border-red-500 @enderror" 
                                        value="{{ old('state') }}" autocomplete="state">
                                        <label class="form-label" for="state" style="margin-left: 0px;">State</label>
                                        @error('state')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 68.8px;"></div><div class="form-notch-trailing"></div></div></div>
                                </div>

                                <div class="col-md-6 mb-2 pb-2">
                                    <div class="form-outline">
                                        <input type="text" name="city" id="city"
                                        class="form-control form-control-lg @error('city') border-red-500 @enderror" 
                                        value="{{ old('city') }}" autocomplete="city">
                                        <label class="form-label" for="city" style="margin-left: 0px;">City</label>
                                        @error('city')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 68.8px;"></div><div class="form-notch-trailing"></div></div></div>
                                </div>
                            </div>

                             <div class="row">
                                <div class="col-md-6 mb-2 pb-2">
                                    <div class="form-outline">
                                        <input type="text" name="blood_group" id="blood_group"
                                        class="form-control form-control-lg @error('blood_group') border-red-500 @enderror" 
                                        value="{{ old('blood_group') }}" autocomplete="blood_group">
                                        <label class="form-label" for="blood_group" style="margin-left: 0px;">Blood Group</label>
                                        @error('blood_group')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 68.8px;"></div><div class="form-notch-trailing"></div></div></div>
                                </div>

                                <div class="col-md-6 mb-2 pb-2">
                                    <div class="form-outline">
                                        <input type="date" name="dob" id="dob"
                                        class="form-control form-control-lg @error('dob') border-red-500 @enderror" 
                                        value="{{ old('dob') }}" autocomplete="dob">
                                        <label class="form-label" for="dob" style="margin-left: 0px;">Date of birth</label>
                                        @error('dob')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 68.8px;"></div><div class="form-notch-trailing"></div></div></div>
                                </div>
                            </div>


                        </div>
                    </div>                   

                    
                    <div class="col-lg-6 bg-indigo">
                        <div class="p-5">
                            <h3 class="fw-normal mb-3" style="color: #4835d4;">Company's Details</h3>

                            <div class="mb-2 pb-2">
                                <div class="form-outline">
                                    <input type="text" name="designation" id="designation" 
                                    class="form-control form-control-lg @error('designation') border-red-500 @enderror" 
                                    value="{{ old('designation') }}" required autocomplete="designation">
                                    <label class="form-label" for="designation" style="margin-left: 0px;">Employees Designation *</label>
                                    @error('designation')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                </div>
                            </div>

                            <div class="mb-2 pb-2">
                                <div class="form-outline">
                                    <input type="text" name="company_name" id="company_name" 
                                    class="form-control form-control-lg @error('company_name') border-red-500 @enderror" 
                                    value="{{ old('company_name') }}" autocomplete="company_name">
                                    <label class="form-label" for="company_name" style="margin-left: 0px;">Company Name</label>
                                    @error('company_name')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                </div>
                            </div>

                            <div class="mb-2 pb-2">
                                <div class="form-outline">
                                    <input type="text" name="address" id="address" 
                                    class="form-control form-control-lg @error('address') border-red-500 @enderror" 
                                    value="{{ old('address') }}" autocomplete="address">
                                    <label class="form-label" for="address" style="margin-left: 0px;">Company Address</label>
                                    @error('address')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                </div>
                            </div>

                            <div class="mb-2 pb-2">
                                <div class="form-outline">
                                    <input type="text" name="website" id="website" 
                                    class="form-control form-control-lg @error('website') border-red-500 @enderror" 
                                    value="{{ old('website') }}" autocomplete="website">
                                    <label class="form-label" for="website" style="margin-left: 0px;">Website URL</label>
                                    @error('website')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                </div>
                            </div>

                            {{-- <div class="form-check d-flex justify-content-start mb-2 pb-3">
                                <input class="form-check-input me-3" type="checkbox" name="terms" value="" id="terms">
                                <label class="form-check-label" for="terms">
                                I do accept the <a href="#!" class=""><u>Terms and Conditions</u></a> of your site.
                                </label>
                            </div> --}}

                            <div>
                                <button type="submit" class="btn btn-primary">Add EMployee</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 bg-indigo">
                        <div class="p-5">
                            <h3 class="fw-normal mb-3" style="color: #4835d4;">Company's Details</h3>
                        </div>
                    </div>
                    
                </div>
            </div>


        </form>
    </div>
</div>

@endsection

