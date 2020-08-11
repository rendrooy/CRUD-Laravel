<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $table = 'perusahaan';

    protected $fillable = ['nama_perusahaan'];

    public function siswa() {
        return $this->belongsToMany('App\Obat', 'perusahaan_obat', 'id_perusahaan', 'id_obat');
    }
}
