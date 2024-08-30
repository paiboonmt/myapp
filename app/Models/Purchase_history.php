<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Purchase_history extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'card_id',
        'product_id',
        'date_of_buy',
    ];
}
