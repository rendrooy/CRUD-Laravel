<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PerusahaanRequest;
use App\Perusahaan;
use Session;

class PerusahaanController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $perusahaan_list = Perusahaan::all();
        return view('perusahaan.index', compact('perusahaan_list'));
    }

    public function create() {
        return view('perusahaan.create');
    }

    public function store(PerusahaanRequest $request) {
        Perusahaan::create($request->all());
        Session::flash('flash_message', 'Data perusahaan berhasil disimpan.');
        return redirect('perusahaan');
    }

    public function edit(Perusahaan $perusahaan) {
        return view('perusahaan.edit', compact('perusahaan'));
    }

    public function update(Perusahaan $perusahaan, PerusahaanRequest $request) {
        $perusahaan->update($request->all());
        Session::flash('flash_message', 'Data perusahaan berhasil diupdate.');
        return redirect('perusahaan');
    }

    public function destroy(Perusahaan $perusahaan) {
        $perusahaan->delete();
        Session::flash('flash_message', 'Data perusahaan berhasil dihapus.');
        Session::flash('penting', true);
        return redirect('perusahaan');
    }
}
