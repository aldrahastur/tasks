<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use Uuids;
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable =[
        'name',
        'email',
        'address',
        'zip_code',
        'city',
        'vat_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}
