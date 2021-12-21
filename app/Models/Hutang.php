<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hutang extends Model {
    
    use HasFactory;
    protected $table = 'Hutang';
    public $incrementing = false;

    protected $fillable = [
        'user_id', 'jumlah',   
    ];

}
