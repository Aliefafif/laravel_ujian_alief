<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;
    protected $fillable = ['id','nama_mobil','deskripsi','harga','stok','foto','id_jenis','id_merk'];
   public $timestamp = true;

   public function jenis()
   {
       return $this->belongsTo(jenis::class,'id_jenis');
   }
    public function merk()
   {
       return $this->belongsTo(merk::class,'id_merk');
   }}