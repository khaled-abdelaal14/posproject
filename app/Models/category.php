<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use Spatie\Translatable\HasTranslations;



class category extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $fillable=['name','notes'];
    public $translatable = ['name'];    

  

}
