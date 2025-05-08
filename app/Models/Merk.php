<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    use HasFactory;
    public $table = 'merks';
    protected $fillable = ['id','nama_merk'];
    public $timestamp = true;

    //relasi ke tabel merk
    public function merk ()
    {
        return $this->hasMany(merk::class);
    }}

