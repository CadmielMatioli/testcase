<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassRoom extends Model
{
    use SoftDeletes;

    protected $table = 'class_rooms';
    protected $fillable = [
        'name',
        'status'
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
