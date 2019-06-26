<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function __construct(\App\Models\Comment $model) {
        $this->model = $model;
        $this->Post = new \App\Models\Post;
        $this->User = new \App\Models\User;
    }

    public function index()
    {
        $data['comments'] = $this->model->getDataCollection();
        return $data['comments'];
        //return \App\Http\Resources\CommentResource::collection($data['comments']);
    }

    public function getCommentsWithPost()
    {
        $posts= $this->Post->getDataCollection();
        $comments= $this->model->getDataCollection();
        $data['comments'] = $comments->map(function ($item, $key) use($posts) {
            return [
                'name'          => $item->name,
                'email'         => $item->email,
                'body'         => $item->body,
                'post'     => $posts->firstWhere('id', $item->postId),

            ];
           
        })->all();

        return $data['comments'] ;
        
    }
    public function getCommentsWithPostAndUser()
    {
        $comments= $this->model->getDataCollection();
        $posts= $this->Post->getDataCollection();
        $users= $this->User->getDataCollection();
    
        $data['comments'] = $comments->map(function ($item, $key) use($posts,$users) {
            $post = $posts->firstWhere('id', $item->postId);
            return [
                'name'         => $item->name,
                'email'         => $item->email,
                'body'         => $item->body,
                'post'     => $post ,
                'user' => $users->firstWhere('id', $post->userId)
            ];
        })->all();

        return $data['comments'];
    }
}
