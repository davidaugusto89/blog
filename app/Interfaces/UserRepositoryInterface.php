<?php

namespace App\Interfaces;

interface UserRepositoryInterface 
{
    public function updateUser($request);
    public function listUsers();
    public function changePermissionUser($idUser);
}