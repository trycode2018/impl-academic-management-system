<?php

namespace App\Services;

use App\Models\SchoolClass;

class ClassService
{
    /**
     * Listar todas as classes com paginação
     */
    public function getAllClasses()
    {
        return SchoolClass::orderBy('level')->paginate(10);
    }

    /**
     * Obter todas as classes (sem paginação, para selects)
     */
    public function getAllClassesForSelect()
    {
        return SchoolClass::orderBy('level')->get();
    }

    /**
     * Encontrar classe por ID
     */
    public function getClassById($id)
    {
        return SchoolClass::findOrFail($id);
    }

    /**
     * Criar uma nova classe
     */
    public function createClass(array $data)
    {
        // Verificar se já existe classe com o mesmo nível
        if (SchoolClass::where('level', $data['level'])->exists()) {
            throw new \Exception('Já existe uma classe com este nível.');
        }
        return SchoolClass::create($data);
    }

    /**
     * Actualizar uma classe
     */
    public function updateClass($id, array $data)
    {
        $class = $this->getClassById($id);
        
        // Se o nível está a ser alterado, verificar unicidade
        if (isset($data['level']) && $data['level'] != $class->level) {
            if (SchoolClass::where('level', $data['level'])->exists()) {
                throw new \Exception('Já existe uma classe com este nível.');
            }
        }
        
        $class->update($data);
        return $class;
    }

    /**
     * Eliminar uma classe
     */
    public function deleteClass($id)
    {
        $class = $this->getClassById($id);
        
        // Verificar se existem turmas associadas
        if ($class->groups()->count() > 0) {
            throw new \Exception('Não é possível eliminar uma classe que possui turmas associadas.');
        }
        
        return $class->delete();
    }
}