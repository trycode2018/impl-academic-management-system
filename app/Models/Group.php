<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'course_id', 'school_class_id', 'year', 'max_students'];

    /**
     * Relacionamento: Turma pertence a um curso
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Relacionamento: Turma pertence a uma classe
     */
    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class);
    }

    /**
     * Relacionamento: Turma tem muitos alunos
     * (Pode ser implementado no módulo de alunos)
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}