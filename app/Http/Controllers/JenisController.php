<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\JenisRequest;
use App\Jenis;
use Session;

class JenisController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $jenis_list = Jenis::all();
        return view('jenis/index', compact('jenis_list'));
    }

    public function create() {
        return view('jenis.create');
    }

    public function store(JenisRequest $request) {
        Jenis::create($request->all());
        Session::flash('flash_message', 'Data jenis berhasil disimpan.');
        return redirect('jenis');
    }

    public function edit(Jenis $jenis) {
        return view('jenis.edit', compact('jenis'));
    }

    public function update(Jenis $jenis, JenisRequest $request) {
        $jenis->update($request->all());
        Session::flash('flash_message', 'Data jenis berhasil diupdate.');
        return redirect('jenis');
    }

    public function destroy(Jenis $jenis) {
        $jenis->delete();
        Session::flash('flash_message', 'Data jenis berhasil dihapus.');
        Session::flash('penting', true);
        return redirect('jenis');
    }
}
