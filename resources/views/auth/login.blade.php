@extends('template_login.layout')

@section('content')
<!-- page -->
<div class="page">

    <!-- main-signin-wrapper -->
    <div class="my-auto page page-h">
        <div class="main-signin-wrapper">
            <div class="main-card-signin d-md-flex">
                <div class="wd-md-50p login d-none d-md-block page-signin-style p-5 text-white">
                    <div class="my-auto authentication-pages">
                        <div>
                            <img src="{{ asset('foto.png') }}" width="70%" class=" m-0 mb-4" alt="logo">
                            <h5 class="mb-4">Aplikasi Perpustakaan <br> <u>by: Rio Ferdinand Adriansyah</u></h5>
                            {{-- <p class="mb-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p> --}}
                        </div>
                    </div>
                </div>
                <div class="sign-up-body wd-md-50p">
                    <div class="main-signin-header">
                        <h2>Selamat Datang</h2>
                        <div class="px-0 col-12 mb-2">
                            @include('componen.pesan')
                        </div>
                        <h6>Form Input Login</h6>
                        <form method="POST" action="{{ route('auth') }}">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" class="form-control" placeholder="Enter your email" type="email" value="{{ old('email') }}" >
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" class="form-control" placeholder="Enter your password" type="password" value="{{ old('password') }}">
                            </div>
                            <button style="margin-left: 4em" type="submit" class="btn btn-primary"><i class="fe fe-log-in"></i> Login </button>
                            <a href="{{ route('registrasi') }}" class="btn btn-danger"><i class="fe fe-log-in"></i>Sign Up</a>

                        </form>
                    </div>
                    {{-- <div class="main-signin-footer mt-3 mg-t-5">
						
						<p>Don't have an account? <a href="page-signup.html">Create an Account</a></p>
					</div> --}}
                </div>
            </div>
        </div>
    </div>


</div>
<!-- End page -->
@endsection