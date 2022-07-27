<?php

namespace App\Interfaces;

interface PostRepositoryInterface 
{
    public function getAllPosts($request);
    public function getPostById($orderId);
    public function deletePost($orderId);
    public function createPost($request);
    public function updatePost($orderId, $request);
}