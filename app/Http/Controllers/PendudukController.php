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
            return $q->where('nama_lengkap', 'like', "%{$query}%")
                     ->orWhere('nik', 'like', "%{$query}%")
                     ->orWhere('alamat', 'like', "%{$query}%")
                     ->orWhere('jenis_kelamin', 'like', "%{$query}%")
                     ->orWhere('tempat_lahir', 'like', "%{$query}%")
                     ->orWhere('status_perkawinan', 'like', "%{$query}%")
                     ->orWhere('pekerjaan', 'like', "%{$query}%")
                     ->orWhere('agama', 'like', "%{$query}%")
                     ->orWhere('pendidikan_terakhir', 'like', "%{$query}%");
        })
        ->orderBy('nama_lengkap')
        ->paginate(10)
        ->withQueryString();

        return view('penduduk.index', compact('penduduk', 'query'));
    }
}
