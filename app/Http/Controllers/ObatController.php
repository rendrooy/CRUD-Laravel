<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Obat;
use App\Jenis;
use App\Perusahaan;
use App\Http\Requests\ObatRequest;
use Storage;
use Session;


class ObatController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => [
            'index', 'show', 'cari'
        ]]);
    }

    /*
    | -------------------------------------------------------------------------------------------------------
    | INDEX
    | -------------------------------------------------------------------------------------------------------
    */
    public function index() {
        $obat_list = Obat::paginate(5);
        $jumlah_obat = Obat::count();
        return view('obat.index', compact('obat_list', 'jumlah_obat'));
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | SHOW DETAIL
    | -------------------------------------------------------------------------------------------------------
    */
    public function show(Obat $obat) {
        return view('obat.show', compact('obat'));
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | CREATE
    | -------------------------------------------------------------------------------------------------------
    */
    public function create() {
        return view('obat.create');
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | EDIT
    | -------------------------------------------------------------------------------------------------------
    */
    public function edit(Obat $obat) {
        // if (!empty($siswa->telepon->nomor_telepon)) {
        //     $siswa->nomor_telepon = $siswa->telepon->nomor_telepon;
        // }

        return view('obat.edit', compact('obat'));
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | CREATE
    | -------------------------------------------------------------------------------------------------------
    */
    public function store(ObatRequest $request) {
        $input = $request->all();

        // Upload foto.
        if ($request->hasFile('foto')) {
            $input['foto'] = $this->uploadFoto($request);
        }

        // Insert Siswa.
        $obat = Obat::create($input);

        // Insert Telepon.
        // if ($request->filled('nomor_telepon')) {
        //     $this->insertTelepon($siswa, $request);
        // }

        // Insert Hobi.
        $obat->perusahaan()->attach($request->input('perusahaan_Obat'));

        // Flass message.
        Session::flash('flash_message', 'Data obat berhasil disimpan.');

        return redirect('obat');
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | UPDATE
    | -------------------------------------------------------------------------------------------------------
    */
    public function update(Obat $obat, ObatRequest $request) {
        $input = $request->all();

        // Update foto.
        if ($request->hasFile('foto')) {
            $input['foto'] = $this->updateFoto($obat, $request);
        }

        // Update siswa.
        $obat->update($input);

        // Update telepon.
        // $this->updateTelepon($siswa, $request);

        // Update hobi.
        $obat->perusahaan()->sync($request->input('perusahaan_obat'));

        // Flash message.
        Session::flash('flash_message', 'Data obat berhasil diupdate.');

        return redirect('obat');
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | DESTROY / DELETE
    | -------------------------------------------------------------------------------------------------------
    */
    public function destroy(Obat $obat) {
        // Hapus foto kalau ada.
        $this->hapusFoto($obat);

        $obat->delete();

        // Flash message.
        Session::flash('flash_message', 'Data obat berhasil dihapus.');
        Session::flash('penting', true);

        return redirect('obat');
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | CARI
    | -------------------------------------------------------------------------------------------------------
    */
    public function cari(Request $request) {
        $kata_kunci = trim($request->input('kata_kunci'));

        if (! empty($kata_kunci)) {
            //$jenis_kelamin = $request->input('jenis_kelamin');
            $id_jenis = $request->input('id_jenis');

            // Query
            $query = Obat::where('nama_obat', 'LIKE', '%' . $kata_kunci . '%');
            //(! empty($jenis_kelamin)) ? $query->JenisKelamin($jenis_kelamin) : '';
            (! empty($id_jenis)) ? $query->Jenis($id_jenis) : '';

            $obat_list = $query->paginate(2);

            // URL Links pagination
            // $pagination = (! empty($jenis_kelamin)) ? $siswa_list->appends(['jenis_kelamin' => $jenis_kelamin]) : '';
            $pagination = (! empty($id_jenis)) ? $pagination = $obat_list->appends(['id_jenis' => $id_jenis]) : '';
            $pagination = $obat_list->appends(['kata_kunci' => $kata_kunci]);

            $jumlah_obat = $obat_list->total();
            return view('obat.index', compact('obat_list', 'kata_kunci', 'pagination', 'jumlah_obat', 'id_jenis'));
        }

        return redirect('obat');
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | INSERT TELEPON
    | -------------------------------------------------------------------------------------------------------
    */
    // private function insertTelepon(Siswa $siswa, SiswaRequest $request) {
    //     $telepon = new Telepon;
    //     $telepon->nomor_telepon = $request->input('nomor_telepon');
    //     $siswa->telepon()->save($telepon);
    // }


    /*
    | -------------------------------------------------------------------------------------------------------
    | UPDATE TELEPON
    | -------------------------------------------------------------------------------------------------------
    */
    // private function updateTelepon(Siswa $siswa, SiswaRequest $request) {
    //     if ($siswa->telepon) {
    //         // Jika telp diisi, update.
    //         if ($request->filled('nomor_telepon')) {
    //             $telepon = $siswa->telepon;
    //             $telepon->nomor_telepon = $request->input('nomor_telepon');
    //             $siswa->telepon()->save($telepon);
    //         }
    //         // Jika telp tidak diisi, hapus.
    //         else {
    //             $siswa->telepon()->delete();
    //         }
    //     }
    //     // Buat entry baru, jika sebelumnya tidak ada no telp.
    //     else {
    //         if ($request->filled('nomor_telepon')) {
    //             $telepon = new Telepon;
    //             $telepon->nomor_telepon = $request->input('nomor_telepon');
    //             $siswa->telepon()->save($telepon);
    //         }
    //     }
    // }


    /*
    | -------------------------------------------------------------------------------------------------------
    | UPLOAD FOTO
    | -------------------------------------------------------------------------------------------------------
    */
    private function uploadFoto(ObatRequest $request) {
        $foto = $request->file('foto');
        $ext  = $foto->getClientOriginalExtension();

        if ($request->file('foto')->isValid()) {
            $foto_name   = date('YmdHis'). ".$ext";
            $request->file('foto')->move('fotoupload', $foto_name);
            return $foto_name;
        }
        return false;
    }

    /*
    | -------------------------------------------------------------------------------------------------------
    | UPDATE FOTO
    | -------------------------------------------------------------------------------------------------------
    */
    private function updateFoto(Obat $obat, ObatRequest $request) {
        // Jika user mengisi foto.
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada foto baru.
            $exist = Storage::disk('foto')->exists($obat->foto);
            if (isset($obat->foto) && $exist) {
                $delete = Storage::disk('foto')->delete($obat->foto);
            }

            // Upload foto baru.
            $foto = $request->file('foto');
            $ext  = $foto->getClientOriginalExtension();
            if ($request->file('foto')->isValid()) {
                $foto_name   = date('YmdHis'). ".$ext";
                $upload_path = 'fotoupload';
                $request->file('foto')->move($upload_path, $foto_name);
                return $foto_name;
            }
        }
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | HAPUS FOTO
    | -------------------------------------------------------------------------------------------------------
    */
    private function hapusFoto(Obat $obat) {
        $is_foto_exist = Storage::disk('foto')->exists($obat->foto);

        if ($is_foto_exist) {
            Storage::disk('foto')->delete($obat->foto);
        }
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | DATE MUTATOR
    | -------------------------------------------------------------------------------------------------------
    */
    public function dateMutator() {
        $obat = Obat::findOrFail(1);
        $nama = $obat->nama_obat;
        //$tanggal_lahir = $siswa->tanggal_lahir->format('d-m-Y');
        // $ulang_tahun = $siswa->tanggal_lahir->addYears(30)->format('d-m-Y');
        // return "Siswa <strong>{$nama}</strong> lahir pada <strong>{$tanggal_lahir}</strong>.<br>
        //         Ulang tahun ke-30 akan jatuh pada <strong>{$ulang_tahun}</strong>.";
    }

}