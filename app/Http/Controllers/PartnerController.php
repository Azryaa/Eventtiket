<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    // Tugas 3: Mengambil data dan melempar ke View
    public function index()
    {
        $partners = Partner::all(); // Mengambil seluruh data partner
        return view('admin.partners.index', compact('partners'));
    }

    // Tugas 4: Menyimpan request data ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'logo_url' => 'required|string'
        ]);

        Partner::create([
            'name' => $request->name,
            'logo_url' => $request->logo_url
        ]);

        // Redirect kembali ke daftar utama setelah sukses
        return redirect()->route('partners.index')->with('success', 'Partner berhasil ditambahkan!');
    }
}