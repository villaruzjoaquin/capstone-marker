<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'comments',
        'color_code',
        'group_id',
    ];

    public function group()
    {
        // A student belongs to one group
        return $this->belongsTo(Group::class);
    }

}
