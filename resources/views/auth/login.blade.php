@extends('layouts.app')

@section('content')
<section class="vh-100" style="background-color: gray;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img
                src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/img1.jpg"
                alt="login form"
                class="img-fluid" style="border-radius: 1rem 0 0 1rem;"
              />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

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

                <form action="{{ route('login') }}" method="post">
                    @csrf

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">CraneHR</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline mb-4">
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" class="form-control form-control-lg @error('email') border border-danger @enderror" />
                    <label class="form-label" for="email">Email address</label>
                    @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="password" name="password" class="form-control form-control-lg @error('password') border border-danger @enderror" value="{{ old('password') }}"/>
                    <label class="form-label" for="password">Password</label>
                    @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>

                  <div class="mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember" class="form-label">Remember me</label>                        
                    </div>
                  </div>


                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                  </div>

                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="{{ route('register') }}" style="color: #393f81;">Register here</a></p>
                  <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection