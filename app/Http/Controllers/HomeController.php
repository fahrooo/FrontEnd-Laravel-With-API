<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $response = Http::get('http://127.0.0.1:8000/api/v1/users');
        $data = json_decode($response->body(), true);

        return view('index', compact('data'));
    }

    public function tambahUser(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'     => 'required|email',
            'password'   => 'required|min:8'
        ]);

        $response = Http::post('http://127.0.0.1:8000/api/v1/users/create', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response) {
            return redirect()->route('home')->with(['success' => 'Data Berhasil Ditambahkan!']);
        } else {
            return redirect()->route('home')->with(['error' => 'Data Gagal Ditambahkan!']);
        }
    }

    public function updateUser(Request $request)
    {
        $this->validate($request, [
            'name_put'     => 'required',
            'email_put'     => 'required|email',
            'password_put'   => 'required|min:8'
        ]);

        $response = Http::put('http://127.0.0.1:8000/api/v1/users/update/' . $request->id, [
            'name' => $request->name_put,
            'email' => $request->email_put,
            'password' => $request->password_put,
        ]);

        if ($response) {
            return redirect()->route('home')->with(['success' => 'Data Berhasil Diubah!']);
        } else {
            return redirect()->route('home')->with(['error' => 'Data Gagal Diubah!']);
        }
    }

    public function deleteUser(Request $request)
    {
        $response = Http::delete('http://127.0.0.1:8000/api/v1/users/delete/' . $request->id_delete);

        if ($response) {
            return redirect()->route('home')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('home')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
