<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebOrder extends Model
{
    use HasFactory;
    protected $table = 'web_orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'whatsapp',
        'institution',
        'message',
        'status',
    ];
}
