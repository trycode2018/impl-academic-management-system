<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Http\Requests\StoreUserRequest;
use Illuminate\View\View;

class UserController extends Controller
{
    protected UserService $userService;

    /**
     * Injecção de dependência do serviço
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Lista todos os utilizadores
     */
    public function index(): View
    {
        $users = $this->userService->getAllUsers();

        return view('users.index', compact('users'));
    }


    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $user = $this->userService->createUser($request->validated());
        return redirect()->route('users.index')->with('success', 'Utilizador criado com sucesso!');
    }

}