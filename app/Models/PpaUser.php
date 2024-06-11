<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class PpaUser extends Model
{ 
    use HasFactory, SoftDeletes;
    protected $table = 'ppa_users';
    protected $fillable = [
        'name',
        'mobile',
        'email',
        'family_id',
        'district_id',
        'status',
    ];
}
