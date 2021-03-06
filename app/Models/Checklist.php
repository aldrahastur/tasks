<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checklist extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'checklist_group_id',
        'user_id',
        'name',
        'repo_name',
    ];


   public function tasks(): HasMany
   {
        return $this->hasMany(Task::class);
    }
}
