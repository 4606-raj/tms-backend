<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
       'type','email','name','mobile','district','family_id','source','channel','user_id','user_id','category_id','category_id','sub_category_id','sub_category_id','new_sub_category_id','new_sub_category_id','assign_by','attachment','auto_close','ticket_number','assign_to','resloved_at','description','priority','remark',
    ];

    public function category() {
        return $this->hasMany(Category::class);
    }

    public function subCategory() {
        return $this->hasMany(Category::class, 'sub_category_id');
    }

    public function newSubcategory() {
        return $this->hasMany(Category::class, 'new_subcategory_id');
    }
    
}
