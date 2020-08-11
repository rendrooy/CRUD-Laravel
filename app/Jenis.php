<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = 'Jenis';

    protected $fillable = ['nama_jenis'];

    public function menu() {
        return $this->hasMany('App\Jenis', 'id_jenis');
    }
}
