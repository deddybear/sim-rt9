<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iuran extends Model {
    use HasFactory;

    protected $table = 'Iuran';
    public $incrementing = false;

    protected $fillable = [
        'keterangan', 'jumlah',
    ];
}
