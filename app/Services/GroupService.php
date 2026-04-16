<?php

namespace App\Services;

use App\Models\Group;

class GroupService
{
    /**
     * Listar turmas com relações (curso e classe)
     */
    public function getAllGroups()
    {
        return Group::with(['course', 'schoolClass'])
                    ->orderBy('year', 'desc')
                    ->orderBy('name')
                    ->paginate(10);
    }

    /**
     * Obter turma por ID
     */
    public function getGroupById($id)
    {
        return Group::with(['course', 'schoolClass'])->findOrFail($id);
    }

    /**
     * Criar uma nova turma
     */
    public function createGroup(array $data)
    {
        // Verificar se já existe turma com o mesmo nome no mesmo ano
        if (Group::where('name', $data['name'])
                 ->where('year', $data['year'])
                 ->exists()) {
            throw new \Exception('Já existe uma turma com este nome no ano lectivo indicado.');
        }
        
        return Group::create($data);
    }

    /**
     * Actualizar uma turma
     */
    public function updateGroup($id, array $data)
    {
        $group = $this->getGroupById($id);
        
        // Verificar duplicação de nome no mesmo ano (ignorando a própria turma)
        if (isset($data['name']) && isset($data['year']) && 
            ($data['name'] != $group->name || $data['year'] != $group->year)) {
            if (Group::where('name', $data['name'])
                     ->where('year', $data['year'])
                     ->where('id', '!=', $id)
                     ->exists()) {
                throw new \Exception('Já existe uma turma com este nome no ano lectivo indicado.');
            }
        }
        
        $group->update($data);
        return $group;
    }

    /**
     * Eliminar uma turma
     */
    public function deleteGroup($id)
    {
        $group = $this->getGroupById($id);
        
        // Verificar se existem alunos matriculados (quando o módulo de alunos existir)
        // if ($group->students()->count() > 0) {
        //     throw new \Exception('Não é possível eliminar uma turma com alunos matriculados.');
        // }
        
        return $group->delete();
    }
}