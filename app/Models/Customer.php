<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

class Customer extends Model
{
    use Uuids;
    use Billable, HasFactory, Notifiable, SoftDeletes;

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


    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
