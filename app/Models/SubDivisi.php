<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDivisi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function divisi(){
        return $this->belongsTo(Divisi::class);
    }
}
