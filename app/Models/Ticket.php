<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Ticket extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
       'type','email','name','mobile','district','family_id','source','channel','user_id','user_id','category_id','category_id','sub_category_id','sub_category_id','child_sub_category_id','assign_by','attachment','auto_close','ticket_number','assign_to','resloved_at','description','priority','remark',
    ];

    public function users() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function subCategory() {
        return $this->belongsTo(Category::class, 'sub_category_id');
    }

    public function childSubcategory() {
        return $this->belongsTo(Category::class, 'child_sub_category_id');
    }

    public function districts() {
        return $this->belongsTo(District::class, 'district');
    }

    public function channels() {
        return $this->belongsTo(Channel::class,'channel');
    }

    public function sources() {
        return $this->belongsTo(Source::class,'source');
    }
    
}
