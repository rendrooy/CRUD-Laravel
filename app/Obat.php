<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat';

    protected $fillable = [
        'nama_obat',
        'harga',
        'id_jenis',
        'foto'
    ];

    // protected $dates = ['tanggal_lahir'];

    // Relasi Menu - Negara
    public function perusahaan() {
        return $this->belongsToMany('App\Perusahaan', 'perusahaan_obat', 'id_obat', 'id_perusahaan')->withTimeStamps();
    }


    // Relasi Menu - Category
    public function jenis() {
        return $this->belongsTo('App\Jenis', 'id_jenis');
    }


    // // Relasi Siswa - Telepon
    // public function telepon() {
    //     return $this->hasOne('App\Telepon', 'id_siswa');
    // }


    // Accessor
    public function getNamaObatAttribute($nama_obat) {
        return ucwords($nama_obat);
    }


    // Mutator
    public function setNamaObatAttribute($nama_obat) {
        $this->attributes['nama_obat'] = strtolower($nama_obat);
    }


    // Accessor
    public function getPerusahaanObatAttribute() {
        return $this->perusahaan->pluck('id')->toArray();
    }

    // Scope category
    public function scopeJenis($query, $id_jenis) {
        return $query->where('id_jenis', $id_jenis);
    }

    // Scope Jenis Kelamin
    // public function scopeJenisKelamin($query, $jenis_kelamin) {
    //     return $query->where('jenis_kelamin', $jenis_kelamin);
    // }

}
