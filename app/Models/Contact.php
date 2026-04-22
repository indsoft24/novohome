<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'title',
        'address1',
        'address2',
        'phone1',
        'phone2',
        'email',
        'whatsapp',
        'image'
    ];
}
