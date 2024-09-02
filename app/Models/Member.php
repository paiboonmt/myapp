<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'usertype',
        'card_id',
        'visa_id',
        'gender',
        'fname',
        'product',
        'birthday',
        'nationality',
        'phone',
        'email',
        'sta_date',
        'exp_date',
        'address',
        'comment',
        'image',
    ];


}
