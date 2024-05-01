<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
      'group_name',
      'to_do',
      'comments',
      'finished_tasks',
      'section_id',  
    ];

    public function students()
    {
        // A group can have many students
        return $this->hasMany(Student::class);
    }

    public function section()
    {
        // A group belongs to one section
        return $this->belongsTo(Section::class);
    }
}
