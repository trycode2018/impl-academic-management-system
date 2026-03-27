<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Exibe a página de edição do perfil
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Atualiza a senha do utilizador
     */
    public function update(UpdatePasswordRequest $request): RedirectResponse
    {
        $this->userService->updatePassword(
            $request->user(),
            $request->validated()
        );

        return back()->with('status', 'Senha alterada com sucesso!');
    }
}