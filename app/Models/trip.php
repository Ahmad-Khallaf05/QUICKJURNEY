<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trip extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'location',
        'description',
        'capacity',
        'price',
        'start_at',
        'end_at',
        'cat_id',

    ];

    public function category(){
        return $this->belongsTo(category::class,'cat_id');
    }
    public function trip_images(){
        return $this->hasMany(trip_images::class,'trip_id');
    }



}
