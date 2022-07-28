<?php

namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Cache;

class PostRepository implements PostRepositoryInterface
{
    private $expiration = 5; //minutos

    public function getAllPosts($request)
    {
        $search = $request->input('search');

        $key = 'posts_' . $search;

        return Cache::remember($key, $this->expiration, function () use ($search) {
            if (empty($search)) {
                return Post::with('authors')->orderByDesc('created_at')->get();
            } else {
                return Post::with('authors')
                    ->where('title', 'LIKE', '%' . $search . '%')
                    ->orWhere('body', 'LIKE', '%' . $search . '%')
                    ->get();
            }
        });
    }

    public function getPostById($postId)
    {
        $key = 'post_' . $postId;

        return Cache::remember($key, $this->expiration, function () use ($postId) {
            return Post::with('authors')->find($postId);
        });
    }

    public function createPost($request)
    {
        $postDetails = [
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'user_id' => Auth::id(),
        ];

        if ($request->file('image')) {
            $postDetails['image'] = $this->uploadImage($request);
        }

        Session::flash('message', 'Post cadastrado com sucesso!');
        Session::flash('icon', 'success');

        return Post::create($postDetails);
    }

    public function updatePost($postId, $request)
    {
        $postDetails = [
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'user_id' => Auth::id(),
        ];

        if ($request->file('image')) {
            $postDetails['image'] = $this->uploadImage($request);
            $this->removeImage($postId);
        }

        Session::flash('message', 'Post atualizado com sucesso!');
        Session::flash('icon', 'success');

        return Post::whereId($postId)->update($postDetails);
    }

    public function deletePost($postId)
    {
        if (Post::find($postId)) {
            Session::flash('message', 'Post removido com sucesso!');
            Session::flash('icon', 'success');

            $this->removeImage($postId);
        }

        Post::destroy($postId);
    }

    public function uploadImage($request)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = uniqid() . '.' . $extension;
        $request->image->move(public_path('images'), $filename);
        return $filename;
    }

    public function removeImage($postId)
    {
        $post = Post::find($postId);
        $filename = $post->image;
        $image_path = public_path() . '/images/' . $filename;
        unlink($image_path);
    }
}
