<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacte extends Model
{
    protected $table ='Contacts';
    protected $fillable=[
        'name',
        'email',
        'subject',
        'message',
        'user_id'

    ];
    use HasFactory;
}
