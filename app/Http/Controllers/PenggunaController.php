<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Validator;

class PenggunaController extends Controller
{
    public function registerPage()
    {
        return view("users.register");
    }

    public function loginPage()
    {
        return view("users.login");
    }

    public function registerPengguna(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pengguna' => 'required|unique:penggunas,nama_pengguna',
            'email' => 'required|email|unique:penggunas,email',
            'password' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $lastPengguna = Pengguna::orderBy('id_pengguna', 'desc')->first();
        if ($lastPengguna) {
            $lastId = intval(substr($lastPengguna->id_pengguna, 1));
            $newId = 'P' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newId = 'P001';
        }

        $data = $request->all();
        $data['id_pengguna'] = $newId;
        $data['password'] = bcrypt($data['password']);

        $pengguna = Pengguna::create($data);

        return view('users.login');
    }

    public function loginPengguna(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email|unique:penggunas,email',
            'password' => 'required|min:5',
        ]);

        $pengguna = Pengguna::where('email', $request->email)->first();

        if (!$pengguna) {
            return response()->json(['success' => false, 'message' => 'User not found'], 404);
        }

        $cookie = cookie('id_pengguna', $pengguna->id_pengguna, 120);
        return redirect()->route('user.dashboard')->withCookie($cookie);
    }

    public function dashboard(Request $request)
    {
        return view('dashboard');
    }

    public function addFilm()
    {
        return view('tambah-film');
    }
}
