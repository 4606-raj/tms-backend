<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Authority extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'authorities';
    protected $fillable = [
        'name',
        'status',
    ];
    // public function users() {
    //     return $this->belongsTo(User::class);
    // }
}
