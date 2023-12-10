<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function Users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
