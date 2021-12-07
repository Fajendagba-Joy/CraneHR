@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <form action="{{ route('register') }}" method="post">
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
                                    <input type="text" name="name" id="name"
                                    class="form-control form-control-lg @error('name') border border-danger @enderror" 
                                    value="{{ old('name') }}" required autocomplete="name">
                                    <label class="form-label" for="name" style="margin-left: 0px;">Name</label>
                                    @error('name')
                                        <div class="text-danger error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-2 pb-2">
                                    <div class="form-outline">
                                        <input type="password" name="password" id="password"
                                        class="form-control form-control-lg @error('password') border border-danger @enderror" 
                                        value="{{ old('password') }}" required autocomplete="password">
                                        <label class="form-label" for="password" style="margin-left: 0px;">Choose a password</label>
                                        @error('password')
                                            <div class="text-danger error">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 68.8px;"></div><div class="form-notch-trailing"></div></div></div>
                                </div>

                                <div class="col-md-6 mb-2 pb-2">
                                    <div class="form-outline">
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control form-control-lg @error('password_confirmation') border border-danger @enderror" 
                                        value="{{ old('password') }}" required autocomplete="password_confirmation">
                                        <label class="form-label" for="password_confirmation" style="margin-left: 0px;">Repeat Password</label>
                                        @error('password_confirmation')
                                            <div class="text-danger error">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 68.8px;"></div><div class="form-notch-trailing"></div></div></div>
                                </div>
                            </div>

                            <div class="mb-2 pb-2">
                                <div class="form-outline">
                                    <input type="email" name="email" id="email" 
                                    class="form-control form-control-lg @error('email') border border-danger @enderror" 
                                    value="{{ old('email') }}" required autocomplete="email">
                                    <label class="form-label" for="email" style="margin-left: 0px;">Email Address</label>
                                    @error('email')
                                        <div class="text-danger error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                </div>
                            </div>

                            <div class="mb-2 pb-2">
                                <div class="form-outline">
                                    <input type="text" name="country" id="country" 
                                    class="form-control form-control-lg @error('country') border border-danger @enderror" 
                                    value="{{ old('country') }}" required autocomplete="country">
                                    <label class="form-label" for="country" style="margin-left: 0px;">Country</label>
                                    @error('country')
                                        <div class="text-danger error">
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
                                        class="form-control form-control-lg @error('state') border border-danger @enderror" 
                                        value="{{ old('state') }}" required autocomplete="state">
                                        <label class="form-label" for="state" style="margin-left: 0px;">State</label>
                                        @error('state')
                                            <div class="text-danger error">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 68.8px;"></div><div class="form-notch-trailing"></div></div></div>
                                </div>

                                <div class="col-md-6 mb-2 pb-2">
                                    <div class="form-outline">
                                        <input type="text" name="city" id="city"
                                        class="form-control form-control-lg @error('city') border border-danger @enderror" 
                                        value="{{ old('city') }}" required autocomplete="city">
                                        <label class="form-label" for="city" style="margin-left: 0px;">City</label>
                                        @error('city')
                                            <div class="text-danger error">
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
                                    <input type="text" name="company_name" id="company_name" 
                                    class="form-control form-control-lg @error('company_name') border border-danger @enderror" 
                                    value="{{ old('company_name') }}" required autocomplete="company_name">
                                    <label class="form-label" for="company_name" style="margin-left: 0px;">Company Name</label>
                                    @error('company_name')
                                        <div class="text-danger error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                </div>
                            </div>

                            <div class="mb-2 pb-2">
                                <div class="form-outline">
                                    <input type="text" name="address" id="address" 
                                    class="form-control form-control-lg @error('address') border border-danger @enderror" 
                                    value="{{ old('address') }}" required autocomplete="address">
                                    <label class="form-label" for="address" style="margin-left: 0px;">Company Address</label>
                                    @error('address')
                                        <div class="text-danger error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                </div>
                            </div>

                            <div class="mb-2 pb-2">
                                <div class="form-outline">
                                    <input type="text" name="website" id="website" 
                                    class="form-control form-control-lg @error('website') border border-danger @enderror" 
                                    value="{{ old('website') }}" required autocomplete="website">
                                    <label class="form-label" for="website" style="margin-left: 0px;">Website URL</label>
                                    @error('website')
                                        <div class="text-danger error">
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
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </div>
                    
                </div> {{--  row --}}
            </div>


        </form>
    </div>
</div>

@endsection

