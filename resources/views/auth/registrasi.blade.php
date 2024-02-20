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
                                <img src="{{ asset('foto.png') }}" width="70%" class=" m-0 mb-4"
                                    alt="logo">
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
                            <h6>Form Registrasi</h6>
                            <form method="POST" action="{{ route('auth_regis') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Username</label>
                                    <input name="username" class="form-control" placeholder="Enter your username"
                                        type="text" value="{{ old('username') }}"equired autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" class="form-control" placeholder="Enter your email" type="email"
                                        value="{{ old('email') }}"equired autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="password" class="form-control" placeholder="Enter your password"
                                        type="password" value="{{ old('password') }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input name="nama_lengkap" class="form-control" placeholder="Enter your nama lengkap"
                                        type="text" value="{{ old('nama_lengkap') }}"equired autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input name="alamat" class="form-control" placeholder="Enter your alamat"
                                        type="text" value="{{ old('alamat') }}"equired autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Hak Akses</label>
                                    <select name="role" class="form-control select2" id="">
                                        <option value="">=== Pilih Hak Akses ===</option>
                                        <option value="petugas">Petugas</option>
                                        <option value="peminjam">Peminjam</option>
                                    </select>
                                </div>
                                <a href="{{ route('login') }}" style="margin-left: 4em" class="btn btn-info">
                                    << Back</a>
                                        <button type="submit" class="btn btn-primary"><i class="fe fe-log-in"></i>
                                            Save</button>

                            </form>
                        </div>
                        {{-- <div class="main-signin-footer mt-3 mg-t-5">
						
						<p>Don't have an account? <a href="page-signup.html">Crseate an Account</a></p>
					</div> --}}
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- End page -->
@endsection
