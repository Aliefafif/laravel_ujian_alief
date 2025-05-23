<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;
    protected $fillable = ['id','nama'];
    public $timestamp = true;

    //relasi ke tabel jenis
    public function jenis ()
    {
        return $this->hasMany(jenis::class);
    }}
