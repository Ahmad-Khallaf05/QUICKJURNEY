<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trip_images extends Model
{
    use HasFactory;
    protected $fillable =[
        'image',
        'trip_id',
    ];

  public function trip(){
      $this->belongsTo(trip::class);
  }
}
