<?php

namespace App\Models;
// namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class testimonial extends Model
{
    protected $fillable = ['testimonial', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
