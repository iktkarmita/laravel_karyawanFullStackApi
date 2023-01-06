<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
   //
   protected $table = 'pegawai';
   protected $fillable = [
      'nip',
      'nama',
      'tmpt_lahir',
      'tgl_lahir',
      'jenis_kelamin',

      'alamat',
      'foto',
      'nohp',
   ];

   public function agama()
   {
      return $this->belongsTo('App\Agama', 'agama_id', 'id_agm');
   }
   public function negara()
   {
      return $this->belongsTo('App\Negara', 'negara_id', 'id_ngr');
   }
   public function darah()
   {
      return $this->belongsTo('App\Darah', 'gol_darah_id', 'id_darah');
   }
   public function keluarga()
   {
      return $this->belongsTo('App\Keluarga', 'skeluarga_id', 'kdstatusk');
   }

   public function pendidikan()
   {
      return $this->hasMany('App\Pendidikan');
   }

   public function Pelatihan()
   {
      return $this->hasMany('App\Pelatihan');
   }

   public function Jabatan()
   {
      return $this->hasMany('App\Jabatan');
   }
}
