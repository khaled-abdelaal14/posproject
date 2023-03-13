<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];
    protected $fillable=['name','price','category_id','notes'];
    public function categorie(){
        return $this->belongsTo(category::class,'category_id');
    }
}
