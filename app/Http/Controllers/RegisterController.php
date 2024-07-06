<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyTestMail;
use App\Models\User;
use App\Models\Sekolah;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', [
            'title' => 'Register'
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:255',
            'username' => 'required|min:4|max:20',
            'email' => 'required|email',
            'password' => 'required|min:5|max:255',
            'role' => 'required',
        ]);
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'group_id' => $request->role,
            'hak' => $request->role,
            'nama_sekolah' => $request->nama_sekolah
        ]);
        return redirect('/Dashboard/pendaftaranuser')->with('success', 'Pendaftaran Akun Berhasil!');
    }
    public function prosesuseradd(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:255',
            'username' => 'required|min:4|max:20',
            'email' => 'required|email',
            'password' => 'required|min:5|max:255',
            'role' => 'required',
        ]);
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'group_id' => $request->role,
            'hak' => $request->role
        ]);
        return redirect('/Dashboard/master/daftaruser')->with('success', 'Pendaftaran Akun Berhasil!');
    }
}
