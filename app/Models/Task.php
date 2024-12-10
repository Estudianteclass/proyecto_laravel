<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = [
        'name',
        'descripcion',
        
    ];
    public function User():BelongsTo{

        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}