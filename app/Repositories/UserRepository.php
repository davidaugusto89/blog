<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserRepository implements UserRepositoryInterface 
{
    public function updateUser($request) 
    {
        
        $userDetails = [];

        $validated = true;

        if (Auth::user()->name !== $request->input('name')){
            $userDetails['name'] = $request->input('name');
        }

        if (Auth::user()->email !== $request->input('email')){
            $validated = $request->validate(['email' => ['required', 'string', 'email', 'max:255', 'unique:users']]);
            $userDetails['email'] = $request->input('email');
        }

        if (!$validated) {
            return false;
        }

        User::whereId(Auth::id())->update($userDetails);

        Session::flush();
        Auth::logout();

        Session::flash('message', 'Perfil atualizado com sucesso!');
        Session::flash('icon', 'success');

        return redirect('login');
    }

    public function listUsers()
    {
        return User::orderBy('id')->get();
    }

    public function changePermissionUser($idUser)
    {
        $user = User::find($idUser);
        $userDetails['type'] = $user->type === 'A' ? 'U' : 'A';

        User::whereId($idUser)->update($userDetails);

        Session::flash('message', 'Perfil alterado com sucesso!');
        Session::flash('icon', 'success');

        return redirect('user.list');
    }
}