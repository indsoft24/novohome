<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatsappSection extends Model
{
    protected $fillable = [
    'heading',
    'subtext',
    'button_text',
    'whatsapp_link',
    'image',
    'marquee_text'
];
}
