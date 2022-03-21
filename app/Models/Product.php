<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $guarded=[];
    protected $fillable =['name','price','content','category_id','feature_image_path'];
    public function category(){
        return $this ->belongsTo(Category::class,'category_id');
    }
 
}
