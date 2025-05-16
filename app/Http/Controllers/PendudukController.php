<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        $penduduk = Penduduk::when($query, function ($q) use ($query) {
            return $q->where('nama_lengkap', 'like', "%$query%")
                     ->orWhere('nik', 'like', "%$query%")
                     ->orWhere('alamat', 'like', "%$query%");
        })->paginate(10);

        return view('penduduk.index', compact('penduduk', 'query'));
    }
}