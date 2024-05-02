<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'task',
        'group_id',
        'completed',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

}
