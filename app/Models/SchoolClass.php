<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    use HasFactory;

    protected $table = 'school_classes';

    protected $fillable = ['name', 'level'];

    /**
     * Relacionamento: Uma classe tem muitas turmas
     */
    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    /**
     * Relacionamento: Uma classe tem muitos alunos (através das turmas)
     * (Opcional, pode ser implementado mais tarde)
     */
    public function students()
    {
        return $this->hasManyThrough(Student::class, Group::class);
    }
}