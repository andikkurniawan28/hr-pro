<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konfigurasi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function setel()
    {
        $konfigurasi = self::get()->last();
        return $konfigurasi;
    }
}
