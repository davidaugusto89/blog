<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\UserRepositoryInterface;

class UserController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) 
    {
        $this->userRepository = $userRepository;
    }

    public function profile()
    {
        return view('user.edit');

    }

    public function update(Request $request){
        return $this->userRepository->updateUser($request);        
    }

    public function list()
    {
        $users = $this->userRepository->listUsers();
        return view('user.list', compact('users'));
    }

    public function changePermission($id)
    {
        return $this->userRepository->changePermissionUser($id);
    }
}
