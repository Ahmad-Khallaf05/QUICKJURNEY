<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guide_rating extends Model
{
    use HasFactory;
    protected $fillable = [
        'rate', 'guide_id', 'user_id'
    ];

    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }
}