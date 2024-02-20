<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User; // MENGARAH KE MODEL USER

class LoginController extends Controller

{
    public function login()
    {
        return view('auth.login');
    }

    public function registrasi()
    {
        return view('auth.registrasi');
    }

    public function auth(Request $request)
    {

        // VALIDASI DATA YANG MASUK
        $validasi = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:5',
            ],
            [
                'email.required' => 'Email harus di isi',
                'password.required' => 'Password harus di isi dan minimal 5 karekter',
            ],
        );

        // PROSES AUTHTENTICATION
        if (Auth::attempt($validasi)) {
            $request->session()->regenerate();

            // KALO DATA NYA SAMA MAKA ARAHKAN KE DASHBOARD
        return redirect('buku')->with('success', 'Berhasil login');
        
            
        } else {
            return redirect('/')->withErrors('Email atau password yang di masukan tidak sesuai');
        }

        //KALO DATANYA TIDAK SAMA MAKA KEMBALI KE HALAMAN SEMULA
        return back();
    }

    public function logout()
    {
        Auth::logout(); // PROSES LOGOUT
        return redirect('/')->with('success', 'Berhasil logout'); // KALO BERHASIL LOGOUT KE HALAMAN LOGIN
    }

    public function auth_regis(Request $request)
    {
        // MENYIMPAN DATA SEMENTARA
        Session::flash('username', $request->username);
        Session::flash('email', $request->email);
        Session::flash('password', $request->password);
        Session::flash('nama_lengkap', $request->nama_lengkap);
        Session::flash('alamat', $request->alamat);
        Session::flash('role', $request->role);

        // PROSES VALIDASI 
        $request->validate(
            [
                'username' => 'required',
                'email' => 'required',
                'password' => 'required|min:5',
                'nama_lengkap' => 'required|max:30',
                'alamat' => 'required',
                'role' => 'required',
            ],
            [
                'username.required' => 'Username wajib di isi',
                'email.required' => 'Email wajib di isi',
                'password.required' => 'Password wajib di isi',
                'nama_lengkap.required' => 'Nama Lengkap wajib di isi',
                'alamat.required' => 'Alamat wajib di isi',
                'role.required' => 'Role wajib di isi',
            ],
        );

        // PROSES MENYIMPAN REQUEST KE VARIABEL $DATA
        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'role' => $request->role,
        ];

        User::create($data); // PROSES CREATE DATA
        return back()->with('success', 'Berhasil melakukan registrasi'); // PROSES REDIRECT KE HALAMAN SEMULA
    }

}
