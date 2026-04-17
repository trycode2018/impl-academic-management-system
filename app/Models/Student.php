<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'address', 'birth_date', 'gender', 'photo', 'status'];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'enrollments')->withPivot('status', 'enrollment_date');
    }

    public function isActive()
    {
        return $this->status;
    }
}